Here’s a refactored version of your code following your MVC structure:

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
}



⸻

3. View (app/Views/admin/ressellers/index.php)

<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="alert alert-danger fade in radius-bordered alert-shadowed"><b>Sellers</b></div>

<center>
    <table class="table table-bordered table-striped">
        <tr>
            <td>Username</td>
            <td>Whole Sales</td>
            <td>Current Sales</td>
            <td>BTC Address</td>
            <td>Actions</td>
        </tr>
        <?php foreach ($resellers as $reseller): ?>
            <tr>
                <td><?= htmlspecialchars($reseller['username']) ?> (seller<?= $reseller['id'] ?>)</td>
                <td>$ <?= htmlspecialchars($reseller['allsales']) ?></td>
                <td>$ <?= htmlspecialchars($reseller['soldb']) ?></td>
                <td><?= empty($reseller['btc']) ? 'N/A' : htmlspecialchars($reseller['btc']) ?></td>
                <td>
                    <a href="ress.php?id=<?= urlencode($reseller['username']) ?>">
                        <img src="../seller/img/edit.png" width="20px" height="20px">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</center>

<?php include __DIR__ . '/../layouts/footer.php'; ?>



⸻

4. Route Update (routes/admin.php)

$router->get('/admin/ressellers', 'Admin\RessellerController@index');

This refactored version:
	•	Uses a model (Resseller) to fetch data.
	•	Uses a controller (RessellerController) to handle logic.
	•	Uses a view (admin/ressellers/index.php) for display.
	•	Uses MVC principles and follows your structure.

Let me know if you need further adjustments!