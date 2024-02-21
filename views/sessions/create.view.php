<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/head.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <section class="">
      <div class=" items-center px-5 py-12 lg:px-20">
        <div
          class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
          <div class="mt-8">
            <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl tracking-wider">Login</h1>
            <div class="mt-8">
              <form action="/sessions" method="POST" class="space-y-6">
                <div>
                  <label for="email" class="block text-sm font-medium text-neutral-600"> Email address </label>
                  <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required=""
                      placeholder="Your Email"
                      class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                  </div>
                  <?php if (isset($errors['email'])): ?>
                    <p class="mt-1 text-red-500 font-semibold">
                      <?= $errors['email'] ?>
                    </p>
                  <?php endif; ?>
                </div>

                <div class="space-y-1">
                  <label for="password" class="block text-sm font-medium text-neutral-600"> Password </label>
                  <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required=""
                      placeholder="Your Password"
                      class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                  </div>
                  <?php if (isset($errors['password'])): ?>
                    <p class="mt-1 text-red-500 font-semibold">
                      <?= $errors['password'] ?>
                    </p>
                  <?php endif; ?>
                </div>
                <div>
                  <button type="submit"
                    class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php require base_path('views/partials/footer.php') ?>