<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes"
      class="text-sm font-semibold bg-gray-700 text-white rounded-lg p-2 hover:text-black hover:bg-slate-400">Go
      back</a>
    <h3 class="text-lg font-semibold mt-5">
      <?= htmlspecialchars($note['title']) ?>
    </h3>

    <p>
      <?= htmlspecialchars($note['description']) ?>
    </p>
    <div class="mt-5 flex gap-5 items-center">
      <div>
        <a href="/notes/edit?id=<?= $note['note_id'] ?>"
          class="text-sm font-semibold bg-blue-700 text-white rounded-lg py-2 px-4 hover:text-black hover:bg-blue-400">Edit</a>
      </div>
      <form class="mt-3.5" method="POST">
        <input name="_method" class="hidden" type="hidden" value="DELETE">
        <input name="id" class="hidden" type="hidden" value="<?= $note['note_id'] ?>">
        <button
          class="text-sm font-semibold bg-red-700 text-white rounded-lg py-2 px-4 hover:text-black hover:bg-red-400 ">Delete</button>
      </form>
    </div>





  </div>
</main>
<?php require base_path('views/partials/footer.php') ?>