

<?php $__env->startSection('title', 'Detail Tamu'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Detail Tamu</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Nama Lengkap</th>
                                <td>: <?php echo e($bukuTamu->nama_lengkap); ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: <?php echo e($bukuTamu->jenis_kelamin); ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?php echo e($bukuTamu->alamat); ?></td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>: <?php echo e($bukuTamu->no_telepon); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Email</th>
                                <td>: <?php echo e($bukuTamu->email ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Gereja Asal</th>
                                <td>: <?php echo e($bukuTamu->gereja_asal ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Ibadah</th>
                                <td>: <span class="badge bg-info"><?php echo e($bukuTamu->jenis_ibadah); ?></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal Daftar</th>
                                <td>: <?php echo e($bukuTamu->created_at->format('d/m/Y H:i')); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?php if($bukuTamu->keterangan): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6><strong>Keterangan:</strong></h6>
                            <p class="text-muted"><?php echo e($bukuTamu->keterangan); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between">
                    <a href="<?php echo e(route('buku-tamu.index')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                    <div>
                        <a href="<?php echo e(route('buku-tamu.edit', $bukuTamu)); ?>" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form method="POST" action="<?php echo e(route('buku-tamu.destroy', $bukuTamu)); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\buku_tamu_ibadah\crud-buku_tamu\resources\views/buku_tamu/show.blade.php ENDPATH**/ ?>