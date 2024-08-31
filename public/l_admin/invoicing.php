<?php 
include ('header.php');

?>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Generate Property Invoice & Payment Statements
            </h2>
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Generate Property Invoice
            </h4>
            <!---->
            <form>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Select Property
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                
              > <option>Select Property</option>
                <option>West-View Apartments</option>
                <option>WestGate Apartments</option>
                <option>UnionGate Court</option>
                <option>RoseFlower Court</option>
              </select>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Billings
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                
              > <option>All</option>
                <option>Water Bill</option>
                <option>Electricity Bill</option>
                <option>Maintainance</option>
              </select>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Period
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                
              > <option>Select Period </option>
                <option>12 Months</option>
                <option>6 Months</option>
                <option>3 Months</option>
                <option>1 Month</option>
                <option>This Month</option>
              </select>
            </label>   
            </div>
            <div>
              <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              >
                Generate
              </button>
            </div>
            </form>

            <!---->
            <div>
              <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Generate Tenant Rent Invoice
            </h4>
            </div>
            
            <form>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Select Property
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                
              > <option>Select Property</option>
                <option>West-View Apartments</option>
                <option>WestGate Apartments</option>
                <option>UnionGate Court</option>
                <option>RoseFlower Court</option>
              </select>
            </label>

              

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Select House Number
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                > 
                  <option>All--</option>
                  <option>A001</option>
                  <option>A002</option>
                  <option>A003</option>
                  <option>A004</option>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Period
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                > 
                  <option>12 Months</option>
                  <option>6 Months</option>
                  <option>3 Months</option>
                  <option>1 Month</option>
                  <option>This Month</option>
                </select>
              </label>
             
            </div>
            <div>
              <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              >
                Generate
              </button>
            </div>
            </form>
            <!----->

            <div>
              <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Generate Water Bill Invoice
            </h4>

            </div>
            <form>
              <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
              >
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Select Property
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  
                > <option>Select Property</option>
                  <option>West-View Apartments</option>
                  <option>WestGate Apartments</option>
                  <option>UnionGate Court</option>
                  <option>RoseFlower Court</option>
                </select>
              </label>
  
                
  
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Select House Number
                  </span>
                  <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  > 
                    <option>All--</option>
                    <option>A001</option>
                    <option>A002</option>
                    <option>A003</option>
                    <option>A004</option>
                  </select>
                </label>
  
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Period
                  </span>
                  <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  > 
                    <option>12 Months</option>
                    <option>6 Months</option>
                    <option>3 Months</option>
                    <option>1 Month</option>
                    <option>This Month</option>
                  </select>
                </label>
               
              </div>
              <div>
                <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Generate
                </button>
              </div>
              </form>

          </div>

          
          
        </main>
      </div>
    </div>
  </body>
</html>
