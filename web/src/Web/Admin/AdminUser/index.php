<?php

declare(strict_types=1);

use App\User\AdminUser;
use Yiisoft\Html\Html;

/**
 * @var \Yiisoft\View\WebView $this
 * @var iterable<AdminUser> $users
 */

$this->setTitle('Admin Users');
?>

<div class="container">
    <div class="row mb-3">
        <div class="col-md-8">
            <h1>Admin Users</h1>
        </div>
        <div class="col-md-4 text-end">
            <?= Html::a('Add New User', '#', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userList = [];
                foreach ($users as $user) {
                    $userList[] = $user;
                }

                if (empty($userList)) {
                    echo '<tr><td colspan="8" class="text-center py-4"><em>No users found</em></td></tr>';
                } else {
                    foreach ($userList as $user): ?>
                        <tr>
                            <td><?= Html::encode((string)$user->id) ?></td>
                            <td><?= Html::encode($user->username) ?></td>
                            <td><?= Html::encode($user->email) ?></td>
                            <td><?= Html::encode($user->fullname) ?></td>
                            <td><?= Html::encode($user->phone) ?></td>
                            <td>
                                <span class="badge <?= $user->status === 1 ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $user->status === 1 ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td><?= Html::encode($user->createdDate->format('Y-m-d H:i:s')) ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: -12px;
    }
    
    .col-md-8,
    .col-md-4 {
        flex: 0 0 auto;
        padding: 12px;
    }
    
    .col-md-8 {
        flex-basis: 66.666667%;
    }
    
    .col-md-4 {
        flex-basis: 33.333333%;
    }
    
    .text-end {
        text-align: right;
    }
    
    .mb-3 {
        margin-bottom: 1.5rem;
    }
    
    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s ease;
        color: white !important;
    }
    
    .btn-primary {
        background-color: #007bff;
        color: white !important;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
        color: white !important;
    }
    
    .btn-info {
        background-color: #17a2b8;
        color: white !important;
    }
    
    .btn-info:hover {
        background-color: #117a8b;
        color: white !important;
    }
    
    .btn-danger {
        background-color: #dc3545;
        color: white !important;
    }
    
    .btn-danger:hover {
        background-color: #c82333;
        color: white !important;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 12px;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
    }
    
    .table thead {
        background-color: #212529;
        color: white;
    }
    
    .table thead th {
        padding: 12px;
        text-align: left;
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
    }
    
    .table tbody td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
    }
    
    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    
    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .bg-success {
        background-color: #28a745;
        color: white;
    }
    
    .bg-danger {
        background-color: #dc3545;
        color: white;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    .py-4 {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
    
    .text-center {
        text-align: center;
    }
</style>
