<div class="flex items-center ">
    <div class="dark">

        <div>
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg>
                <g id="usuario 1">
                    <g id="User">
                        <path id="Vector"
                            d="M18.75 18.75H11.25C9.01299 18.7524 6.86829 19.6422 5.28648 21.224C3.70467 22.8058 2.81494 24.9505 2.8125 27.1875C2.81243 27.3106 2.83663 27.4326 2.88372 27.5464C2.93081 27.6601 2.99986 27.7635 3.08693 27.8506C3.174 27.9376 3.27737 28.0067 3.39115 28.0538C3.50492 28.1009 3.62687 28.1251 3.75 28.125H26.25C26.3731 28.1251 26.4951 28.1009 26.6089 28.0538C26.7226 28.0067 26.826 27.9376 26.9131 27.8506C27.0001 27.7635 27.0692 27.6601 27.1163 27.5464C27.1634 27.4326 27.1876 27.3106 27.1875 27.1875C27.1851 24.9505 26.2953 22.8058 24.7135 21.224C23.1317 19.6422 20.987 18.7524 18.75 18.75Z"
                            class="fill-gray-500 dark:fill-zinc-500" />
                        <path id="Vector_2"
                            d="M15 16.875C16.4834 16.875 17.9334 16.4351 19.1668 15.611C20.4001 14.7869 21.3614 13.6156 21.9291 12.2451C22.4968 10.8747 22.6453 9.36668 22.3559 7.91183C22.0665 6.45697 21.3522 5.1206 20.3033 4.0717C19.2544 3.02281 17.918 2.3085 16.4632 2.01911C15.0083 1.72972 13.5003 1.87825 12.1299 2.44591C10.7594 3.01356 9.58809 3.97486 8.76398 5.20823C7.93987 6.4416 7.5 7.89164 7.5 9.375C7.50228 11.3634 8.29318 13.2698 9.69921 14.6758C11.1052 16.0818 13.0116 16.8727 15 16.875Z"
                            class="fill-gray-500 dark:fill-zinc-500" />
                    </g>
                </g>
            </svg>
        </div>
    </div>

    <div>
        <p class="px-2 text-base">
            {{ Auth::user()->name }}
        </p>
    </div>

</div>
