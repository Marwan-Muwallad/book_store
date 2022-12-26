<form class="p-5 rounded shadow" style="max-width:30 rem; width: 100%" method="POST" action="php/auth.php">
    <h1 class="text-center display-3 pb-3">LOG IN</h1>
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
       <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
     <?php } ?>
    
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>

    <button type="submit" class="btn btn-primary ">Log In</button>
    <a href="./?page=main">หน้าแรก</a>
</form>