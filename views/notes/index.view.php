<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-5">
      <a href="/notes/create"
        class=" py-2 px-4 bg-blue-600 rounded-lg text-white font-semibold hover:bg-blue-400 hover:text-black">Create
        Note</a>
    </p>
    <ul>
      <?php foreach ($notes as $note): ?>
        <li>
          <a href="/note?id=<?= $note['note_id'] ?>" class="text-blue-700 font-semibold hover:underline">
            <?= htmlspecialchars($note['title']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</main>
<?php require base_path('views/partials/footer.php') ?>