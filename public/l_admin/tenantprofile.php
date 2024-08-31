<?php 
include ('../l_admin/header.php');
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_sess']))
{
    $sessionVarHseNo = $_POST['hseNo'];
    $sessionVarAptmt = $_POST['aprtmtNo'];

    $_SESSION['hseNo'] = $sessionVarHseNo;
    $_SESSION['apartmtName'] = $sessionVarAptmt;
 
}
?>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tenant Profile 
            </h2>
            <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
              Profile
            </h4>
            <img
            class="object-cover"
            src="../assets/img/people.png"
            alt=""
            loading="lazy"
            style="width: 200px; height: 200px; border-radius: 50%;"
            align = "center"
          />
            
              </p>
              <div style="display: flex; justify-content: flex-end; margin-right: 5%; margin-left: 5%; margin-top: 1%">
              <?php 
              $sessionVar = $_SESSION['username'];
              $sessionVarHseNo = $_SESSION['hseNo'];
              $sessionVarAptmt = $_SESSION['apartmtName'];
              

              include ('../tenData/tenFuncs.php');

              ?>
               
                <table style="border-collapse: collapse; width: 70%;">
                <?php if($resultdata): ?>
                  <tr>
                    <?php foreach($resultdata as $row): ?>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the first column -->
                      Full Name.
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?= $row['firstName'] .'&ensp;'.  $row['lastName']?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Mobile
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?= $row['mobileNo'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      ID Number:
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?= $row['idNo']?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Email
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['email']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Tenant Type
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['tntType']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Gender
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['gender']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Next Of Kin
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['nextofKin']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Next Of Kin Contact
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['nextofKinC']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      ID No
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['idNo']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Mobile Number
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['mobileNo']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Apartment Name
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['ApartmtName']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Date Created
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?php echo $row['dateTime']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Unit Details:
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <?= $row['hseNo'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; font-weight: light;">
                      <!-- Content for the first column -->
                      Statements
                    </td>
                    <td style="padding: 10px; font-weight: bold;">
                      <!-- Content for the second column -->
                      <form method = "post" >
                      <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        View Statements
                      </button>
                    </form>
                    </td>
                  </tr>
                </table>
                <?php endforeach; ?>
                <?php else: echo 'No Available Results' ?>
                <?php endif;?>
              </div>
              
          </div>
          <!--Invoicing Table-->
          <h2
          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Invoices
        </h2>
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
           
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                  >
                    <th class="px-4 py-3">Invoice ID</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Balance</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3"></th>
                  </tr>
                </thead>
                <tbody
                  class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      
                        <div>
                          <p class="font-semibold">7890</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Ksh 863.45
                    </td>
                    <td class="px-4 py-3 text-sm">
                        Ksh 863.45
                      </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                      class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                      >
                        Not Paid
                      </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/10/2020
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            View Invoice
                          </button>
                    </td>
                  </tr>

                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      
                        <div>
                          <p class="font-semibold">7890</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Ksh 863.45
                    </td>
                    <td class="px-4 py-3 text-sm">
                        Ksh 863.45
                      </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                      class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                      >
                        Not Paid
                      </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/10/2020
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            View Invoice
                          </button>
                    </td>
                  </tr>

                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      
                        <div>
                          <p class="font-semibold">7890</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Ksh 863.45
                    </td>
                    <td class="px-4 py-3 text-sm">
                        Ksh 863.45
                      </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                      class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                      >
                        Not Paid
                      </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/10/2020
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            View Invoice
                          </button>
                    </td>
                  </tr>

                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      
                        <div>
                          <p class="font-semibold">7890</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Ksh 863.45
                    </td>
                    <td class="px-4 py-3 text-sm">
                        Ksh 863.45
                      </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                      class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                      >
                        Not Paid
                      </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/10/2020
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            View Invoice
                          </button>
                    </td>
                  </tr>

                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        
                        <div>
                          <p class="font-semibold">89-57p</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Ksh 863.45
                    </td>
                    <td class="px-4 py-3 text-sm">
                        Ksh 863.45
                      </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700"
                      >
                        Incomplete
                      </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/10/2020
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            View Invoice
                          </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
            >
              <span class="flex items-center col-span-3">
                Showing 21-30 of 100
              </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                    <li>
                      <button
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous"
                      >
                        <svg
                          aria-hidden="true"
                          class="w-4 h-4 fill-current"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        1
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        2
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        3
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        4
                      </button>
                    </li>
                    <li>
                      <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        8
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        9
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Next"
                      >
                        <svg
                          class="w-4 h-4 fill-current"
                          aria-hidden="true"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                    </li>
                  </ul>
                </nav>
              </span>
            </div>
          </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
