<?php
namespace App\WiFiStore;

// تعريف الواجهات
interface VoucherRepositoryInterface { public function findAndLockAvailable(int $categoryId); public function markAsSold($voucher); }
interface TransactionRepositoryInterface { public function findAndLock(int $transactionId); public function updateStatus($transaction, $status, $refId); }

// تعريف الموديلات (المحاكية)
class EloquentVoucherRepository implements VoucherRepositoryInterface {
    public function findAndLockAvailable(int $categoryId) { return (object)['code' => 'WIFI-999-SUCCESS']; }
    public function markAsSold($voucher) { echo "✅ تم تحديث حالة الكرت في القاعدة.\n"; }
}
class EloquentTransactionRepository implements TransactionRepositoryInterface {
    public function findAndLock(int $transactionId) { return (object)['category_id' => 1, 'transaction_status' => 'pending']; }
    public function updateStatus($transaction, $status, $refId) { echo "✅ تم تحديث المعاملة: $status\n"; }
}

// تعريف الخدمة
class PureOrderProcessingService {
    public function __construct(private $voucherRepo, private $transactionRepo) {}
    public function executeSuccessOrder($id, $ref, $callback) {
        $t = $this->transactionRepo->findAndLock($id);
        $v = $this->voucherRepo->findAndLockAvailable($t->category_id);
        $this->voucherRepo->markAsSold($v);
        $this->transactionRepo->updateStatus($t, 'success', $ref);
        $callback($t, $v);
    }
}

// التشغيل
$service = new PureOrderProcessingService(new EloquentVoucherRepository(), new EloquentTransactionRepository());
$service->executeSuccessOrder(1, "BANK-REF-999", function($t, $v) {
    echo "🎉 النجاح المطلق! الكود الذي حصل عليه العميل هو: " . $v->code . "\n";
});
