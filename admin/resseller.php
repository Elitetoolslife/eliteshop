Here’s the refactored version of your code following your MVC structure.

⸻

1. Model (app/Models/Resseller.php)

<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Resseller
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllResellers()
    {
        $stmt = $this->db->prepare("SELECT * FROM resseller");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResellerByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM resseller WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateReseller($username, $data)
    {
        $stmt = $this->db->prepare("UPDATE resseller SET soldb = :soldb, unsoldb = :unsoldb, isold = :isold, iunsold = :iunsold WHERE username = :username");
        return $stmt->execute([
            ':soldb' => $data['soldb'],
            ':unsoldb' => $data['unsoldb'],
            ':isold' => $data['isold'],
            ':iunsold' => $data['iunsold'],
            ':username' => $username
        ]);
    }

    public function deleteReseller($username)
    {
        $stmt1 = $this->db->prepare("DELETE FROM resseller WHERE username = :username");
        $stmt2 = $this->db->prepare("UPDATE users SET resseller = '0' WHERE username = :username");

        return $stmt1->execute([':username' => $username]) && $stmt2->execute([':username' => $username]);
    }
}



⸻

2. Controller (app/Controllers/Admin/RessellerController.php)

<?php

namespace App\Controllers\Admin;

use App\Models\Resseller;
use App\Core\Controller;

class RessellerController extends Controller
{
    public function index()
    {
        $model = new Resseller();
        $resellers = $model->getAllResellers();
        return $this->view('admin/ressellers/index', ['resellers' => $resellers]);
    }

    public function edit($username)
    {
        $model = new Resseller();
        $reseller = $model->getResellerByUsername($username);

        if (!$reseller) {
            return $this->view('admin/errors/404');
        }

        return $this->view('admin/ressellers/edit', ['reseller' => $reseller]);
    }

    public function update($username)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Resseller();
            $data = [
                'soldb' => $_POST['soldb'] ?? '',
                'unsoldb' => $_POST['unsoldb'] ?? '',
                'isold' => $_POST['isold'] ?? '',
                'iunsold' => $_POST['iunsold'] ?? ''
            ];

            if ($model->updateReseller($username, $data)) {
                $_SESSION['message'] = "Editing Done!";
            } else {
                $_SESSION['error'] = "Editing Error!";
            }
        }
        header("Location: /admin/ressellers/edit/$username");
        exit;
    }

    public function delete($username)
    {
        $model = new Resseller();
        if ($model->deleteReseller($username)) {
            $_SESSION['message'] = "User Deleted!";
        } else {
            $_SESSION['error'] = "User Not Deleted!";
        }
        header("Location: /admin/ressellers");
        exit;
    }
}



⸻

3. View (app/Views/admin/ressellers/edit.php)

<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="alert alert-danger fade in radius-bordered alert-shadowed"><b>Edit Reseller</b></div>

<?php if (!empty($_SESSION['message'])): ?>
    <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
<?php endif; ?>
<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
</ul>

<div class="row">
    <div class="col-md-4">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                <form id="tab" method="post" action="/admin/ressellers/update/<?= urlencode($reseller['username']); ?>">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" value="<?= htmlspecialchars($reseller['username']); ?>" class="form-control" name="user" disabled>
                    </div>
                    <div class="form-group">
                        <label>Sold Balance</label>
                        <input type="text" value="<?= htmlspecialchars($reseller['soldb']); ?>" class="form-control" name="soldb">
                    </div>
                    <div class="form-group">
                        <label>Unsold Balance</label>
                        <input type="text" value="<?= htmlspecialchars($reseller['unsoldb']); ?>" class="form-control" name="unsoldb">
                    </div>
                    <div class="form-group">
                        <label>Items Sold</label>
                        <input type="text" value="<?= htmlspecialchars($reseller['isold']); ?>" class="form-control" name="isold">
                    </div>
                    <div class="form-group">
                        <label>Items Unsold</label>
                        <input type="text" value="<?= htmlspecialchars($reseller['iunsold']); ?>" class="form-control" name="iunsold">
                    </div>
                    <div class="form-group">
                        <label>Bitcoin Address</label>
                        <input type="text" value="<?= htmlspecialchars($reseller['btc']); ?>" class="form-control" name="btc" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/admin/ressellers/delete/<?= urlencode($reseller['username']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    <input type="reset" value="Reset" class="btn btn-reset"/>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>



⸻

4. Routes (routes/admin.php)

$router->get('/admin/ressellers', 'Admin\RessellerController@index');
$router->get('/admin/ressellers/edit/{username}', 'Admin\RessellerController@edit');
$router->post('/admin/ressellers/update/{username}', 'Admin\RessellerController@update');
$router->get('/admin/ressellers/delete/{username}', 'Admin\RessellerController@delete');



⸻

Key Improvements

✅ Follows MVC Structure – Separation of concerns between models, controllers, and views.
✅ Prevents SQL Injection – Uses prepared statements.
✅ Cleaner URL Structure – Uses RESTful routes instead of ress.php?id=....
✅ Session Messages – Uses $_SESSION['message'] and $_SESSION['error'] for feedback.
✅ Confirmation for Delete – Adds a confirmation prompt before deleting.

This is now fully integrated with your MVC framework. Let me know if you need tweaks!