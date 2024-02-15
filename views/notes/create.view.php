<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-slate-100 rounded-lg p-5 shadow-lg my-10">
      <form method="POST" action="/notes">
        <label for="" class="text-lg font-semibold">Title</label>
        <input class="mb-5 mt-1 p-2 w-full" name="title" placeholder="Write the title here..." type="text"
          value="<?= isset($_POST['title']) ? $_POST['title'] : "" ?>">

        <?php if (isset($errors['title'])): ?>
          <p class=" text-red-500 font-semibold">
            <?= $errors['title'] ?>
          </p>
        <?php endif; ?>
        <br>
        <label for="" class="font-semibold text-lg">Description</label>
        <textarea class="w-full mt-1 p-2" name="description" id="" cols="30" rows="5"
          placeholder="Write the description here"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
        <?php if (isset($errors['description'])): ?>
          <p class="mt-1 text-red-500 font-semibold">
            <?= $errors['description'] ?>
          </p>
        <?php endif; ?>
        <p class="text-right">
          <button
            class=" py-2 px-4 bg-green-600 rounded-lg text-white font-semibold hover:bg-green-400 hover:text-black mt-5">
            Create
          </button>
        </p>
      </form>
    </div>
  </div>
</main>
<?php require base_path('views/partials/footer.php') ?>