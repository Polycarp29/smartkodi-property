<?php 
include ('header.php');

?>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              SMS Reminder Alerts
            </h2>
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Send SMS Reminder Alerts to Tenants
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              

              <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Custom
                </span>
                <div class="mt-2">
                  <label
                    class="inline-flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="personal"
                    />
                    <span class="ml-2">Individual Tenant</span>
                    <!--This will prompt list of all clients and apartments-->
                  </label>
                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">All Tenants</span>
                  </label>
                </div>
              </div>

              

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Message</span>
                <textarea
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  rows="3"
                  placeholder="Dear[TENANT] Kindly Remember to settle your [Balance] by [Date]. Thank You."
                ></textarea>
              </label>

              <div class="flex mt-6 text-sm">
                <div>
                  <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  >
                    Send
                  </button>
                </div>
              </div>
            </div>
          </div>
        </main
      </div>
    </div>
  </body>
</html>
