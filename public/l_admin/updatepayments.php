<?php 
include('../l_admin/header.php');
?>

<main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            Add Payments <?php  echo $_SESSION['HseNum'] ?>
            </h2>
            <?php 
            include('../finances/updatepayments.php');
            ?>
            <form id = "tenantForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php
                

            ?>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <?php   
                $valueName = $_SESSION['username'];
                ?>
              <input type="hidden" id= "custF" name="custF" value="<?php echo $valueName; ?>">
                <span class="text-gray-700 dark:text-gray-400">First Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane "
                  id= "firstName"
                  name="firstName"
                  value = '<?php echo  $_SESSION['firstName'] ?>'
                  readonly
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Doe"
                  id="lastName"
                  name="lastName"
                  value = "<?php echo $_SESSION['lastName']?>";
                  readonly
                />
              </label>
              <br>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Apartment Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  id="apartmtName"
                  name="ApartmtName"
                  value = "<?php echo $_SESSION['ApartmtName'] ?>"
                  readonly
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Unit No</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  id="unitNo"
                  name="unitNo"
                  value = "<?php  echo $_SESSION['HseNum'] ?>"
                  readonly
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Rent Arrears</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  id="bal"
                  name="bal"
                  value = "<?php echo $_SESSION['bal']?>"
                  readonly
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Amount Paid</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  type = 'number'
                  id="amount"
                  name="amount"
                />
              </label>
              <br>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Payment Method
                </span>
                <select
                  name ="pay_method"
                  id = "pay_method"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                  <option selected disabled>---Payment Method ---</option>
                  <option>Bank Transfer</option>
                  <option>Mpesa</option>
                  <option>Cheque</option>
                  <option>Others</option>
                </select>
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Transaction Reference</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="TXYC467GJI"
                  type = 'text'
                  id="ref"
                  name="ref"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Date</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  type = 'date'
                  id="date"
                  name="date"
                />
              </label>

            <br>
            <body>
                <button class="purple-button">Submit</button>
            </body>
            </div>
            </form>
            </div>
        </main>
      </div>
    </div>
  </body>
  <style>
        .purple-button {
        background-color: #6a0dad; /* Purple background color */
        color: #ffffff; /* White text color */
        border: none; /* Remove default border */
        border-radius: 5px; /* Rounded corners */
        padding: 10px 20px; /* Padding inside the button */
        font-size: 12px; /* Font size */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    .purple-button:hover {
        background-color: #5a0da0; /* Darker purple on hover */
    }

    .purple-button:active {
        background-color: #4a0d90; /* Even darker purple when clicked */
    }

  </style>
</html>