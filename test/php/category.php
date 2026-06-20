<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>Category | adminHMD</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>


    <?php include 'navbar.php'; ?>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-8">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar"
            aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
            <input class="form-control search-input" type="search" placeholder="Search users, orders, reports"
              aria-label="Search">
          </form>

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme"
              title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>
            <div class="dropdown">
              <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                aria-label="Notifications">
                <span class="notification-dot"></span>
                <i class="bi bi-bell" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header fw-bold text-body">Notifications</div>
                <a class="dropdown-item" href="users.html">
                  <span class="notification-title">New user registered</span>
                  <span class="notification-time">4 minutes ago</span>
                </a>
                <a class="dropdown-item" href="category.html">
                  <span class="notification-title">Revenue target reached</span>
                  <span class="notification-time">32 minutes ago</span>
                </a>
                <a class="dropdown-item" href="settings.html">
                  <span class="notification-title">Security review completed</span>
                  <span class="notification-time">1 hour ago</span>
                </a>
              </div>
            </div>

            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img class="avatar-img avatar-sm" src="../assets/images/avatar/avatar.jpg" alt="Admin Hasan">
                <span class="profile-name d-none d-sm-inline">Admin Hasan</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                <li><a class="dropdown-item" href="settings.html">Account settings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="login.html">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
              <div>
                <!-- <p class="eyebrow mb-1">Analytics</p> -->
                <h1 class="h3 mb-1">Category</h1>
                <p class="text-muted mb-0">Visualize revenue, channels, and operating performance.</p>
              </div>
            </div>

          </div>

          <section class="row g-3 mt-1">
            <div class="col-12 col-xl-8">
              <!-- <div class="panel h-100">
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-bar-chart-line" aria-hidden="true"></i><span>Revenue Trend</span></h2><p class="text-muted mb-0">Static chart component ready for Chart.js integration.</p></div></div>
                <div class="chart-bars" aria-label="Revenue chart"><div class="chart-column bar-42"><span></span><small>Jan</small></div><div class="chart-column bar-58"><span></span><small>Feb</small></div><div class="chart-column bar-51"><span></span><small>Mar</small></div><div class="chart-column bar-72"><span></span><small>Apr</small></div><div class="chart-column bar-66"><span></span><small>May</small></div><div class="chart-column bar-83"><span></span><small>Jun</small></div></div>
              </div> -->
              <section class="panel">
                <div class="panel-header">
                  <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>
                        Table</span></h2>
                  </div>
                    <thead><input class="form-control form-control-sm table-search" type="search"
                    placeholder="Search orders" data-table-search="ordersTable" aria-label="Search orders">
                </div>
                <div class="table-responsive">
                  <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                      <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th class="text-end">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <tr>
                        <?php
                        // $result = $conn->query("SELECT * FROM categories ORDER BY id ASC");
                        
                        $result = $conn->query("SELECT *, DATE_FORMAT(created_at, '%d/%M/%Y') AS created_at FROM categories ORDER BY id ASC");
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                              <td>{$row['id']}</td>
                              <td>{$row['name']}</td>
                              <td>{$row['status']}</td>
                              <td>{$row['quantity']}</td>
                              <td>{$row['created_at']}</td>
                              <td>
                                <a href='?edit={$row['id']}' class='btn btn-secondary  btn-sm'>Edit</a>
                                <a href='?delete={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>

                              </td>
                            </tr>";
                          }
                        } else {
                          echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
                        }
                        ?>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>
            <div class="col-12 col-xl-4">
              <section class="row g-3">
                <div class="col-12 col-xl-12">

                  <form method="POST" class="panel needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

                    <div class="panel-header">
                      <div>
                        <h2 class="h5 mb-1 section-title"><i class="bi bi-ui-checks-grid"
                            aria-hidden="true"></i><span><?= $editData ? 'Edit Category' : 'Add Product' ?></span>
                        </h2>
                      </div>
                    </div>
                    <div class="row g-3">
                      <div class=""><label class="form-label" for="formName">Product name</label><input
                          class="form-control" name='name' id="formName" value="<?= $editData['name'] ?? '' ?>"
                          required>
                        <div class="invalid-feedback">Product name is required.</div>
                      </div>

                      <div class="col-md-6"><label class="form-label">Status</label><select class="form-select"
                          name="status" id="formStatus" required>
                          <option <?= ($editData['status'] ?? '') == 'Available' ? 'selected' : '' ?>>Available</option>
                          <option <?= ($editData['status'] ?? '') == 'Sold' ? 'selected' : '' ?>>Sold</option>
                        </select>
                        <div class="invalid-feedback">Input Status</div>
                      </div>

                      <div class="col-md-6"><label class="form-label" for="formQuantity">Quantity</label><input
                          class="form-control" name="quantity" id="formQuantity" type="number" min="0"
                          value="<?= $editData['quantity'] ?? '' ?>" required>
                        <div class="invalid-feedback">Input Quantity</div>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                      <?php if ($editData): ?>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-secondary">Cancel</a>
                      <?php endif; ?>
                      <button class="btn <?= $editData ? 'btn-warning' : 'btn-primary' ?>" type="submit">
                        <i class="bi bi-send" aria-hidden="true"></i>
                        <?= $editData ? 'Update' : 'Submit Form' ?>
                      </button>
                    </div>
                  </form>



                </div>
              </section>
          </section>
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success"
              href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a target="_blank"
              class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a> </span>
          <span>Professional dashboard template.</span>
          <span>Analytics chart examples.</span>
        </div>
      </footer>
    </div>
  </div>


  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>
</body>


</html>