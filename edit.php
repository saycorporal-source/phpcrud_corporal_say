<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student</title>
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { 
        background: #eef2f7; 
        min-height: 100vh; 
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .edit-card { 
        width: 100%;
        max-width: 480px; 
        background: white; 
        padding: 40px 35px; 
        border-radius: 16px; 
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border-top: 5px solid #6c5ce7;
    }
    .edit-title { 
        text-align: center; 
        font-weight: 800;
        font-size: 26px;
        color: #2d3436;
    } 
    .subtitle { 
        text-align: center; 
        color: #636e72; 
        margin-top: 6px;
        margin-bottom: 30px;
        font-size: 14px;
    }
    .form-group { margin-bottom: 20px; }
    .form-label { 
        display: block;
        font-weight: 600; 
        margin-bottom: 8px;
        font-size: 14px;
        color: #2d3436;
    }
    .form-control { 
        width: 100%;
        border: 1px solid #dfe6e9;
        background: #f9fafb;
        border-radius: 10px; 
        padding: 13px 15px;
        font-size: 15px;
        outline: none;
        transition: 0.2s;
    }
    .form-control:focus {
        background: white;
        border-color: #6c5ce7;
        box-shadow: 0 0 0 4px rgba(108,92,231,0.15);
    }
    .btn-group {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        margin-top: 30px;
    }
    .btn {
        flex: 1;
        text-decoration: none;
        text-align: center;
        border: none; 
        border-radius: 10px; 
        padding: 12px; 
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-cancel { 
        background-color: #dfe6e9; 
        color: #2d3436;
    } 
    .btn-cancel:hover { background-color: #b2bec3; }
    .btn-update { 
        background-color: #6c5ce7; 
        color: white; 
    } 
    .btn-update:hover { background-color: #5a4bd1; }
</style>
</head>
<body>

    <div class="edit-card">
        <h2 class="edit-title">Edit Student</h2>
        <p class="subtitle">Update the student's information below.</p>
        
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo htmlspecialchars($firstname); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($lastname); ?>" required>
            </div>
            
            <div class="btn-group">
                <a href="homepage.php" class="btn btn-cancel">Cancel</a>                <button type="submit" class="btn btn-update">Update</button>
            </div>
        </form>
    </div>

</body>
</html>