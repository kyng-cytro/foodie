<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/output.css" />
    <title>Foodie | Edit Category</title>
</head>

<body class="min-h-screen flex flex-col font-montserrat">
    <!--- Nav Bar -->
    <?php include('partials/header.php') ?>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM `category` WHERE `id` = $id";

        $res = $conn->query($sql);

        $category = $res->fetch_assoc();

        if (!$category['id']) {
            $_SESSION['no-category-found'] = '<span class="text-sm font-semibold text-red-500">Category not Found.</span>';
            header('location:' . SITEURL . 'admin/manage-categories.php');
        }

        $title = $category['title'];
        $current_image = $category['image_name'];
        $featured = $category['featured'];
        $active = $category['active'];
    } else {
        header('location:' . SITEURL . 'admin/manage-categories.php');
    }
    ?>
    <!-- Main Content -->
    <div class="md:max-w-[80%] mx-auto py-4 px-2 md:px-0 w-full flex-1">
        <div class="space-y-6">
            <h2 class="font-bold text-2xl uppercase">Edit Category</h2>
            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = isset($_POST['featured']) ? $_POST['featured'] == "on" : 0;
                $active = isset($_POST['active']) ? $_POST['active'] == "on" : 0;

                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if ($image_name != "") {
                        $ext = end(explode('.', $image_name));
                        $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;
                        $source_path = $_FILES['image']['tmp_name'];

                        //NOTE: Had to make this directory writable
                        $destination_path = "../images/category/" . $image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if ($upload == false) {
                            $_SESSION['upload'] =  '<span class="text-sm font-semibold text-red-500">Failed to Upload Image.</span>';
                            header('location:' . SITEURL . 'admin/manage-categories.php');
                            die();
                        }

                        // Deleting Old Image
                        if ($current_image != "") {
                            $remove_path = "../images/category/" . $current_image;

                            $remove = unlink($remove_path);
                            if ($remove == false) {
                                $_SESSION['failed-remove'] =  '<span class="text-sm font-semibold text-red-500">Failed to Remove Current Image.</span>';
                                header('location:' . SITEURL . 'admin/manage-categories.php');
                                die();
                            }
                        }
                    } else {
                        $image_name = $current_image;
                    }
                } else {
                    $image_name = $current_image;
                }

                $sql = "UPDATE `category` SET 
                    `title` = '$title',
                    `image_name` = '$image_name',
                    `featured` = '$featured',
                    `active` = '$active',
                    `updated_at` = now()
                    WHERE `id` = $id
                ";

                $res = $conn->real_query($sql);

                push_log($conn, "Updated Category Info For $title");

                if ($res) {
                    $_SESSION['add'] = '<span class="text-sm font-semibold text-green-500">Category Updated Successfully.</span>';
                } else {
                    $_SESSION['add'] = '<span class="text-sm font-semibold text-red-500">An Error Occurred While Updating Category</span>';
                }

                header('location:' . SITEURL . 'admin/manage-categories.php');
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="max-w-3xl">
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                    <input name="title" type="text" id="title" value="<?php echo $title; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div class="mb-6">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Current Image</label>
                    <?php if ($current_image != "") : ?>
                        <img class="h-auto w-40 rounded-lg" src="<?php echo '../images/category/' . $current_image ?>" />
                    <?php else : ?>
                        <p class=" text-sm font-light">No current image to show</p>
                    <?php endif ?>
                </div>
                <div class="mb-6">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">New Image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" accept="image/png, image/jpeg" name="image" id="image" type="file">
                </div>
                <div class="mb-6">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" name="featured" <?php echo $featured == 1 ? 'checked' : null ?> id="featured" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm  text-gray-900">Featured</span>
                    </label>
                </div>
                <div class="mb-6">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" name="active" <?php echo $active == 1 ? 'checked' : null ?> id="active" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm  text-gray-900">Active</span>
                    </label>
                </div>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Category</button>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include('partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>