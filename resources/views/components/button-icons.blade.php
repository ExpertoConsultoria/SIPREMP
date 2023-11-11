@props(['icon' => 'eye', 'disabled' => false])

@php
switch ($icon) {
    case 'eye':
        $bg = ' bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300';
        $focus = ' focus:ring-4 focus:ring-indigo-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_155_5414)">
                <path d="M15 6.05859C9.26818 6.05859 4.07027 9.19453 0.234735 14.2881C-0.0782449 14.7054 -0.0782449 15.2884 0.234735 15.7057C4.07027 20.8054 9.26818 23.9414 15 23.9414C20.7318 23.9414 25.9297 20.8054 29.7653 15.7119C30.0782 15.2946 30.0782 14.7116 29.7653 14.2942C25.9297 9.19453 20.7318 6.05859 15 6.05859ZM15.4112 21.2964C11.6063 21.5357 8.46425 18.3998 8.70359 14.5888C8.89997 11.4467 11.4468 8.89996 14.5888 8.70358C18.3937 8.46424 21.5357 11.6002 21.2964 15.4112C21.0939 18.5471 18.5471 21.0939 15.4112 21.2964ZM15.2209 18.3875C13.1712 18.5164 11.4774 16.8288 11.6125 14.7791C11.7168 13.0853 13.0914 11.7168 14.7852 11.6063C16.8349 11.4774 18.5287 13.1651 18.3937 15.2148C18.2832 16.9147 16.9086 18.2832 15.2209 18.3875Z" fill="white"/>
            </g>
            <defs>
                <clipPath id="clip0_155_5414">
                    <rect width="30" height="30" fill="white"/>
                </clipPath>
            </defs>
        </svg>';
    break;
    case 'edit':
        $bg = ' bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300';
        $focus = ' focus:ring-4 focus:ring-green-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_94_7986)">
                <path d="M15.0416 9.53651C14.6038 9.53651 14.25 9.89122 14.25 10.3281V16.6615C14.25 17.0977 13.8953 17.4531 13.4584 17.4531H2.375C1.93795 17.4531 1.58338 17.0977 1.58338 16.6615V5.57812C1.58338 5.14194 1.93795 4.78651 2.375 4.78651H8.70838C9.14616 4.78651 9.5 4.43179 9.5 3.99489C9.5 3.55784 9.14616 3.20312 8.70838 3.20312H2.375C1.06559 3.20312 0 4.26871 0 5.57812V16.6615C0 17.9709 1.06559 19.0365 2.375 19.0365H13.4584C14.7678 19.0365 15.8334 17.9709 15.8334 16.6615V10.3281C15.8334 9.89035 15.4794 9.53651 15.0416 9.53651Z" fill="white"/>
                <path d="M7.42289 8.81541C7.36752 8.87079 7.33026 8.94124 7.31446 9.0172L6.75478 11.8166C6.72868 11.9464 6.76985 12.0802 6.8632 12.1744C6.93844 12.2496 7.03976 12.2899 7.14355 12.2899C7.16878 12.2899 7.19501 12.2876 7.22111 12.2821L10.0197 11.7224C10.0972 11.7065 10.1677 11.6694 10.2223 11.6138L16.486 5.35018L13.6874 2.55176L7.42289 8.81541Z" fill="white"/>
                <path d="M18.4205 0.616037C17.6488 -0.155867 16.3931 -0.155867 15.622 0.616037L14.5264 1.71163L17.3249 4.5102L18.4205 3.41446C18.7942 3.04163 19.0001 2.54442 19.0001 2.01561C19.0001 1.4868 18.7942 0.989595 18.4205 0.616037Z" fill="white"/>
                </g>
                <defs>
                    <clipPath id="clip0_94_7986">
                        <rect width="19" height="19" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>';
    break;
    case 'delete':
        $bg = ' bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300';
        $focus = ' focus:ring-4 focus:ring-red-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.2824 21.3873H6.78145C6.28506 21.3873 5.87402 21.0032 5.84033 20.5068L5.025 8.38691C4.98906 7.84111 5.42031 7.38066 5.96611 7.38066H17.0978C17.6436 7.38066 18.0748 7.84336 18.0389 8.38691L17.2235 20.5068C17.1898 21.0032 16.7788 21.3873 16.2824 21.3873ZM18.9688 5.61299H4.21191C4.19844 5.61299 4.18945 5.604 4.18945 5.59053V3.00977C4.18945 2.99629 4.19844 2.9873 4.21191 2.9873H18.9688C18.9822 2.9873 18.9912 2.99629 18.9912 3.00977V5.58828C18.9912 5.60176 18.9822 5.61299 18.9688 5.61299Z" fill="white"/>
            <path d="M15.5179 4.2564H7.63184C7.61836 4.2564 7.60938 4.24741 7.60938 4.23394V1.30054C7.60938 1.28706 7.61836 1.27808 7.63184 1.27808H15.5179C15.5313 1.27808 15.5403 1.28706 15.5403 1.30054V4.23394C15.5403 4.24517 15.5313 4.2564 15.5179 4.2564Z" fill="#F3F4F6"/>
            </svg>';
    break;
    case 'print':
        $bg = ' bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300';
        $focus = ' focus:ring-4 focus:ring-indigo-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_627_589)">
                <path d="M16.1113 19.5232H8.88901C8.42881 19.5232 8.05566 19.8963 8.05566 20.3565C8.05566 20.8168 8.42876 21.1899 8.88901 21.1899H16.1112C16.5714 21.1899 16.9446 20.8168 16.9446 20.3565C16.9446 19.8963 16.5715 19.5232 16.1113 19.5232Z" fill="white"/>
                <path d="M16.1113 16.8948H8.88901C8.42881 16.8948 8.05566 17.2679 8.05566 17.7281C8.05566 18.1884 8.42876 18.5615 8.88901 18.5615H16.1112C16.5714 18.5615 16.9446 18.1884 16.9446 17.7281C16.9446 17.2679 16.5715 16.8948 16.1113 16.8948Z" fill="white"/>
                <path d="M23.0556 6.53843H20.4041V1.71543C20.4041 1.25522 20.031 0.88208 19.5707 0.88208H5.4293C4.96909 0.88208 4.59595 1.25518 4.59595 1.71543V6.53843H1.94443C0.872266 6.53843 0 7.41074 0 8.48291V16.8668C0 17.939 0.872266 18.8112 1.94443 18.8112H4.59609V23.2846C4.59609 23.7448 4.96919 24.1179 5.42944 24.1179H19.5706C20.0308 24.1179 20.4039 23.7448 20.4039 23.2846V18.8112H23.0556C24.1277 18.8112 25 17.939 25 16.8668V8.48291C25 7.41079 24.1277 6.53843 23.0556 6.53843ZM6.2626 2.54878H18.7374V6.53843H6.2626V2.54878ZM18.7372 22.4512H6.26279C6.26279 22.2884 6.26279 15.8349 6.26279 15.6334H18.7373C18.7372 15.8399 18.7372 22.2946 18.7372 22.4512ZM19.5707 11.4317H17.4495C16.9893 11.4317 16.6161 11.0586 16.6161 10.5984C16.6161 10.1381 16.9892 9.76504 17.4495 9.76504H19.5707C20.0309 9.76504 20.4041 10.1381 20.4041 10.5984C20.4041 11.0586 20.031 11.4317 19.5707 11.4317Z" fill="white"/>
                </g>
                <defs>
                    <clipPath id="clip0_627_589">
                        <rect width="25" height="25" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>';
    break;
    case 'add':
        $bg = ' bg-lime-500 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300';
        $focus = ' focus:ring-4 focus:ring-lime-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_156_6045)">
                <path d="M14.8438 0H2.86458C1.28125 0 0 1.28125 0 2.86458V19.0104C0 20.5938 1.28125 21.875 2.86458 21.875H9.72917C9.16667 20.6875 8.85417 19.3646 8.85417 17.9688C8.85417 16.7708 9.08333 15.625 9.51042 14.5729C9.46875 14.5833 9.42708 14.5833 9.375 14.5833H4.16667C3.59375 14.5833 3.125 14.1146 3.125 13.5417C3.125 12.9687 3.59375 12.5 4.16667 12.5H9.375C9.77083 12.5 10.125 12.7292 10.2917 13.0625C10.9688 12.0104 11.8438 11.1146 12.875 10.4167H4.16667C3.59375 10.4167 3.125 9.94792 3.125 9.375C3.125 8.80208 3.59375 8.33333 4.16667 8.33333H13.5417C14.1146 8.33333 14.5833 8.80208 14.5833 9.375C14.5833 9.42708 14.5833 9.46875 14.5729 9.51042C15.5417 9.11458 16.6042 8.88542 17.7083 8.86458V2.86458C17.7083 1.28125 16.4271 0 14.8438 0ZM8.33333 6.25H4.16667C3.59375 6.25 3.125 5.78125 3.125 5.20833C3.125 4.63542 3.59375 4.16667 4.16667 4.16667H8.33333C8.90625 4.16667 9.375 4.63542 9.375 5.20833C9.375 5.78125 8.90625 6.25 8.33333 6.25Z" fill="white"/>
                <path d="M17.9687 10.9375C14.0917 10.9375 10.9375 14.0917 10.9375 17.9687C10.9375 21.8458 14.0917 25 17.9687 25C21.8458 25 25 21.8458 25 17.9687C25 14.0917 21.8458 10.9375 17.9687 10.9375ZM20.8333 19.0104H19.0104V20.8333C19.0104 21.4083 18.5437 21.875 17.9687 21.875C17.3937 21.875 16.9271 21.4083 16.9271 20.8333V19.0104H15.1042C14.5292 19.0104 14.0625 18.5437 14.0625 17.9687C14.0625 17.3937 14.5292 16.9271 15.1042 16.9271H16.9271V15.1042C16.9271 14.5292 17.3937 14.0625 17.9687 14.0625C18.5437 14.0625 19.0104 14.5292 19.0104 15.1042V16.9271H20.8333C21.4083 16.9271 21.875 17.3937 21.875 17.9687C21.875 18.5437 21.4083 19.0104 20.8333 19.0104Z" fill="#F3F4F6"/>
                </g>
                <defs>
                    <clipPath id="clip0_156_6045">
                        <rect width="25" height="25" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>';
    break;
    case 'box':
        $bg = ' bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300';
        $focus = ' focus:ring-4 focus:ring-indigo-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.7656 8.83273L21.5441 8.41414L23.6338 22.2849L20.8553 22.7035L18.7656 8.83273Z" fill="white"/>
            <path d="M11.3684 0.990631L7.40234 6.40196H9.08789V12.6914L11.3578 13.4008L13.6484 12.6207V6.40196H15.334L11.3684 0.990631Z" fill="white"/>
            <path d="M8.30469 12.4473V9.13477L3.05859 10.8082L8.30469 12.4473Z" fill="white"/>
            <path d="M18.2031 10.3383L14.4297 9.13477V12.3547L18.3082 11.0344L18.2031 10.3383Z" fill="white"/>
            <path d="M18.8711 14.768L11.7578 17.1902V23.8203L19.8242 21.0738L18.8711 14.768Z" fill="white"/>
            <path d="M11.7578 16.3649L18.7527 13.9832L18.4258 11.8192L11.7578 14.0895V16.3649Z" fill="white"/>
            <path d="M10.9773 16.3648V14.1004L2.17188 11.3492V13.3672L10.9773 16.3648Z" fill="white"/>
            <path d="M10.9766 17.1902L2.17188 14.1922V20.8223L10.9766 23.8203V17.1902ZM3.82812 20.0957C3.71395 20.0956 3.60237 20.0617 3.50748 19.9982C3.41258 19.9347 3.33865 19.8445 3.29501 19.739C3.25137 19.6335 3.23999 19.5175 3.26231 19.4055C3.28463 19.2935 3.33965 19.1907 3.42041 19.11C3.50117 19.0293 3.60404 18.9743 3.71602 18.9521C3.82801 18.9298 3.94407 18.9413 4.04955 18.985C4.15502 19.0287 4.24516 19.1027 4.30859 19.1977C4.37201 19.2926 4.40586 19.4042 4.40586 19.5184C4.40586 19.5942 4.39091 19.6693 4.36187 19.7394C4.33284 19.8095 4.29027 19.8731 4.23662 19.9268C4.18297 19.9804 4.11928 20.0229 4.04918 20.0519C3.97909 20.0809 3.90398 20.0958 3.82812 20.0957Z" fill="white"/>
            </svg>';
    break;
    case 'printOff':
        $bg = ' bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300';
        $focus = ' focus:ring-4 focus:ring-gray-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_627_589)">
                <path d="M16.1113 19.5232H8.88901C8.42881 19.5232 8.05566 19.8963 8.05566 20.3565C8.05566 20.8168 8.42876 21.1899 8.88901 21.1899H16.1112C16.5714 21.1899 16.9446 20.8168 16.9446 20.3565C16.9446 19.8963 16.5715 19.5232 16.1113 19.5232Z" fill="white"/>
                <path d="M16.1113 16.8948H8.88901C8.42881 16.8948 8.05566 17.2679 8.05566 17.7281C8.05566 18.1884 8.42876 18.5615 8.88901 18.5615H16.1112C16.5714 18.5615 16.9446 18.1884 16.9446 17.7281C16.9446 17.2679 16.5715 16.8948 16.1113 16.8948Z" fill="white"/>
                <path d="M23.0556 6.53843H20.4041V1.71543C20.4041 1.25522 20.031 0.88208 19.5707 0.88208H5.4293C4.96909 0.88208 4.59595 1.25518 4.59595 1.71543V6.53843H1.94443C0.872266 6.53843 0 7.41074 0 8.48291V16.8668C0 17.939 0.872266 18.8112 1.94443 18.8112H4.59609V23.2846C4.59609 23.7448 4.96919 24.1179 5.42944 24.1179H19.5706C20.0308 24.1179 20.4039 23.7448 20.4039 23.2846V18.8112H23.0556C24.1277 18.8112 25 17.939 25 16.8668V8.48291C25 7.41079 24.1277 6.53843 23.0556 6.53843ZM6.2626 2.54878H18.7374V6.53843H6.2626V2.54878ZM18.7372 22.4512H6.26279C6.26279 22.2884 6.26279 15.8349 6.26279 15.6334H18.7373C18.7372 15.8399 18.7372 22.2946 18.7372 22.4512ZM19.5707 11.4317H17.4495C16.9893 11.4317 16.6161 11.0586 16.6161 10.5984C16.6161 10.1381 16.9892 9.76504 17.4495 9.76504H19.5707C20.0309 9.76504 20.4041 10.1381 20.4041 10.5984C20.4041 11.0586 20.031 11.4317 19.5707 11.4317Z" fill="white"/>
                </g>
                <defs>
                    <clipPath id="clip0_627_589">
                        <rect width="25" height="25" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>';
    break;
    case 'expe':
        $bg = ' bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300';
        $focus = ' focus:ring-4 focus:ring-gray-300';
        $text = ' text-white font-semibold rounded-lg text-xs px-4 py-2 ';
        $transition = ' transition-all active:translate-y-1';
        $svg = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_156_4753)">
                <path d="M6.78516 16.0715H1.78516V18.2143H6.78516V16.0715ZM3.92795 17.5H2.85663C2.65933 17.5 2.49942 17.3401 2.49942 17.1428C2.49942 16.9456 2.65933 16.7857 2.85663 16.7857H3.92795C4.12524 16.7857 4.28516 16.9456 4.28516 17.1428C4.28516 17.3401 4.12524 17.5 3.92795 17.5ZM5.71368 17.5H5.35663C5.15933 17.5 4.99942 17.3401 4.99942 17.1428C4.99942 16.9456 5.15933 16.7857 5.35663 16.7857H5.71368C5.91098 16.7857 6.07089 16.9456 6.07089 17.1428C6.07089 17.3401 5.91098 17.5 5.71368 17.5Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5771 2.97852L14.0517 0.0250244C14.0123 0.00915527 13.9704 0.000762937 13.9278 0H0.356476C0.313904 0.000762937 0.271942 0.00915527 0.232422 0.0250244L1.70779 2.98004C1.89197 3.34091 2.26199 3.56903 2.66711 3.57147H6.785V2.79144C6.29306 2.61749 5.99796 2.11441 6.08615 1.60004C6.17435 1.08582 6.62036 0.709839 7.14206 0.709839C7.66391 0.709839 8.10992 1.08582 8.19812 1.60004C8.28632 2.11441 7.99121 2.61749 7.49927 2.79144V3.57147H11.6172C12.0229 3.56888 12.3932 3.34015 12.5771 2.97852Z" fill="white"/>
                <path d="M19.6428 1.07147H15V6.42853H18.2143C18.4116 6.42853 18.5715 6.58844 18.5715 6.78574C18.5715 6.98303 18.4116 7.14279 18.2143 7.14279H15V10H18.2143C18.4116 10 18.5715 10.1599 18.5715 10.3572C18.5715 10.5544 18.4116 10.7143 18.2143 10.7143H15V11.7857H15.3572C15.5544 11.7857 15.7143 11.9456 15.7143 12.1428C15.7143 12.3401 15.5544 12.5 15.3572 12.5H15V13.5715H18.2143C18.4116 13.5715 18.5715 13.7314 18.5715 13.9285C18.5715 14.1258 18.4116 14.2857 18.2143 14.2857H15V18.9285H19.6428C19.8401 18.9285 20 18.7686 20 18.5715V1.42853C20 1.23138 19.8401 1.07147 19.6428 1.07147ZM18.2143 12.5H17.1428C16.9456 12.5 16.7857 12.3401 16.7857 12.1428C16.7857 11.9456 16.9456 11.7857 17.1428 11.7857H18.2143C18.4116 11.7857 18.5715 11.9456 18.5715 12.1428C18.5715 12.3401 18.4116 12.5 18.2143 12.5ZM18.2143 8.92853H16.4285C16.2314 8.92853 16.0715 8.76862 16.0715 8.57147C16.0715 8.37418 16.2314 8.21426 16.4285 8.21426H18.2143C18.4116 8.21426 18.5715 8.37418 18.5715 8.57147C18.5715 8.76862 18.4116 8.92853 18.2143 8.92853Z" fill="white"/>
                <path d="M0.357208 20H13.9285C14.1258 20 14.2857 19.8401 14.2857 19.6428V1.15646L13.2161 3.29926C12.9099 3.90121 12.2932 4.28192 11.6179 4.28574H7.5V5.06577C7.99194 5.23972 8.28705 5.7428 8.19885 6.25702C8.11066 6.77139 7.66464 7.14737 7.14279 7.14737C6.62109 7.14737 6.17508 6.77139 6.08688 6.25702C5.99869 5.7428 6.29379 5.23972 6.78574 5.06577V4.28574H2.66785C1.99326 4.28146 1.37741 3.90121 1.07147 3.30002L0 1.15707V19.6428C0 19.8401 0.159912 20 0.357208 20ZM1.07147 16.0715C1.07147 15.6769 1.3913 15.3572 1.78574 15.3572H6.78574C7.18018 15.3572 7.5 15.6769 7.5 16.0715V18.2143C7.5 18.6087 7.18018 18.9285 6.78574 18.9285H1.78574C1.3913 18.9285 1.07147 18.6087 1.07147 18.2143V16.0715Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.49942 1.78574C7.49942 1.98303 7.33951 2.14279 7.14221 2.14279C6.94507 2.14279 6.78516 1.98303 6.78516 1.78574C6.78516 1.58844 6.94507 1.42853 7.14221 1.42853C7.33951 1.42853 7.49942 1.58844 7.49942 1.78574Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.49942 6.07147C7.49942 6.26862 7.33951 6.42853 7.14221 6.42853C6.94507 6.42853 6.78516 6.26862 6.78516 6.07147C6.78516 5.87418 6.94507 5.71426 7.14221 5.71426C7.33951 5.71426 7.49942 5.87418 7.49942 6.07147Z" fill="white"/>
                </g>
                <defs>
                    <clipPath id="clip0_156_4753">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>';
    break;
}
@endphp

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'disabled:opacity-25 focus:outline-none'
                .$bg.' bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300'
                .$focus. ' focus:ring-4 focus:ring-gray-300'
                .$text.' text-white font-semibold rounded-lg text-xs px-4 py-2'
                .$transition.' transition-all active:translate-y-1',
]) }}
{{ $disabled ?? false ? ' disabled' : '' }}>
    {!! $svg !!}
</button>