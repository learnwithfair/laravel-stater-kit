<!-- Database  Start -->
@php
    class DatabaseConnection
    {
        protected static $companyCode;

        public function __construct()
        {
            self::$companyCode = Auth::check() ? Auth::user()->company_code : null;
        }

        // For Footer Logo
        public function MiniLogo()
        {
            $miniLogo = DB::table('logos')
                ->select(['image'])
                ->where('status', 2)
                ->first();
            return $miniLogo;
        }
        // For Header Logo
        public function HeaderLogo()
        {
            $logo = DB::table('logos')
                ->select(['image'])
                ->where('status', 1)
                ->first();
            return $logo;
        }

        // For MiniLogo
        public function miniLogoConnection()
        {
            $miniLogo = DB::table('users')->select('name')->get();
            if (isset($miniLogo[0])) {
                $miniLogo = str_split($miniLogo[0]->name, 1)[0];
                return $miniLogo;
            } else {
                return 'P';
            }
        }

        // For Title
        public function websiteTitle()
        {
            $miniLogo = DB::table('slider_details')->select('title')->get();
            return $miniLogo;
        }

        //  For Count Unread
        public function unreadMessage()
        {
            $unread = DB::table('leave')
                ->join('employees', 'leave.employee_id', '=', 'employees.id')
                ->where('employees.company_code', '=', self::$companyCode)
                ->where('read_at', 0)
                ->whereNotNull('is_supervisor_approve')
                ->count();
            return $unread;
        }

        //  For Notice Messages
        public function noticeReadMessage()
        {
            $messages = DB::table('leave')
                ->limit(3)
                ->join('employees', 'leave.employee_id', '=', 'employees.id')
                ->select(
                    'leave.*',
                    'employees.name as userName',
                    'employees.email',
                    'employees.company_code',
                    'employees.image as profileImage',
                )
                ->orderBy('leave.id', 'DESC')
                ->where('employees.company_code', '=', self::$companyCode)
                ->whereNotNull('is_supervisor_approve')
                ->get();

            return $messages;
        }
    }
@endphp
<!-- Database   End -->
