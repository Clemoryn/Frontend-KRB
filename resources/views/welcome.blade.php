<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'KRBS') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
      <script src="https://cdn.tailwindcss.com"></script>
      <script> tailwind.config = { theme: { extend: {} } } </script>
    @endif
  </head>

  <body class="min-h-screen bg-zinc-200 text-base-content">
    <div class="drawer lg:drawer-open">
      <input id="app-drawer" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content flex flex-col">

        <!-- navbar nya -->
        <div class="navbar bg-zinc-900 text-neutral-content sticky top-0 z-40">
          <div class="flex-none lg:hidden">
            <label for="app-drawer" aria-label="open sidebar" class="btn btn-ghost btn-square">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h12M4 18h16" /></svg>
            </label>
          </div>
          <div class="flex-1">
            <a class="btn btn-ghost normal-case text-lg font-semibold">KRBS</a>
          </div>
          <div class="flex-none">
            <div class="indicator">
              <span class="indicator-item badge badge-error badge-xs"></span>
              <button class="btn btn-ghost btn-square" aria-label="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v1a3 3 0 0 0 6 0v-1"/></svg>
              </button>
            </div>
          </div>
        </div>

        <main class="max-w-[1400px] mx-auto w-full px-4 py-6">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <section class="card bg-zinc-900">
              <div class="card-body">
                <h2 class="card-title">Recent Activity</h2>
                <ul class="space-y-3">
                  @foreach ([
                    ['icon'=>'room','title'=>'Meeting Room - Booked','desc'=>'Meeting Room - Booked'],
                    ['icon'=>'laptop','title'=>'IT Help Laptop','desc'=>'Meeting Room - Booked'],
                    ['icon'=>'cable','title'=>'IT Help Cable','desc'=>'Meeting Room - Booked'],
                  ] as $item)
                    <li class="flex items-start gap-3 p-3 rounded-box border border-base-200">
                      <div class="avatar placeholder">
                        <div class="bg-base-200 text-base-content/70 rounded-full w-10">
                          <span>
                            @if ($item['icon']==='room')
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M7 8h10"/></svg>
                            @elseif ($item['icon']==='laptop')
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M2 18h20"/></svg>
                            @else
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 7h10v10H7z"/><path d="M3 12h4M17 12h4"/></svg>
                            @endif
                          </span>
                        </div>
                      </div>
                      <div class="leading-tight">
                        <div class="font-medium">{{ $item['title'] }}</div>
                        <div class="text-sm text-base-content/70">{{ $item['desc'] }}</div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </section>

            <section class="card bg-zinc-900">
              <div class="card-body">
                <h2 class="card-title">Quick Action</h2>
                <div class="grid grid-cols-2 gap-4">
                  <a href="#" class="card bg-zinc-700 border border-zinc-700 hover:shadow-md">
                    <div class="card-body items-center text-center gap-2">
                      <div class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M5.808 20q-.344 0-.576-.232T5 19.192v-2.634q0-.344.232-.576t.576-.232h6.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zm9.5 0q-.344 0-.576-.232t-.232-.576v-2.634q0-.33.24-.569t.568-.239h2.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zm-9.5-5.25q-.344 0-.576-.232T5 13.942v-2.634q0-.344.232-.576t.576-.232h2.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zm5.5 0q-.344 0-.576-.232t-.232-.576v-2.634q0-.344.232-.576t.576-.232h6.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zM6.212 9.5q-.293 0-.376-.27t.133-.457l5.062-3.815q.223-.162.466-.243t.507-.08t.504.08t.461.243l5.062 3.815q.217.187.133.457t-.376.27z"/></svg>
                      </div>
                      <span class="text-sm font-medium">Book Room</span>
                    </div>
                  </a>
                  <a href="#" class="card bg-zinc-700 border border-zinc-700 hover:shadow-md">
                    <div class="card-body items-center text-center gap-2">
                      <div class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m49.336 12.768l1.152 4.298a3.2 3.2 0 0 1-.967 3.22l-.155.13a5.001 5.001 0 0 0 2.218 8.87l.216.033a3.077 3.077 0 0 1 2.575 2.255l1.173 4.376a4 4 0 0 1-2.828 4.9L12.15 51.72a4 4 0 0 1-4.898-2.829l-1.103-4.117a3.485 3.485 0 0 1 .997-3.459l.163-.14a5.001 5.001 0 0 0-2.37-8.813a3.46 3.46 0 0 1-2.791-2.52L1.04 25.709a4 4 0 0 1 2.83-4.899L44.437 9.94a4 4 0 0 1 4.9 2.828m-4.165.607L4.951 24.152c-.555.149-.885.72-.736 1.275l.791 2.953a9.368 9.368 0 0 1 7.2 6.76a9.368 9.368 0 0 1-2.855 9.455l.791 2.953c.15.555.72.885 1.275.736l40.22-10.777c.555-.149.885-.72.736-1.275l-.79-2.952a9.369 9.369 0 0 1-7.2-6.761a9.368 9.368 0 0 1 2.854-9.455l-.791-2.953a1.041 1.041 0 0 0-1.275-.736m-1.283 21.559a3 3 0 1 1-5.796 1.552a3 3 0 0 1 5.796-1.552m-2.07-7.728a3 3 0 1 1-5.796 1.553a3 3 0 0 1 5.795-1.553m-2.071-7.727a3 3 0 1 1-5.796 1.553a3 3 0 0 1 5.796-1.553M29.383 6.347l2.552 3.644c.037.054.073.109.107.164L7.627 16.697L23.812 5.364a4 4 0 0 1 5.57.983"/></svg>
                      </div>
                      <span class="text-sm font-medium">Create Ticket</span>
                    </div>
                  </a>
                  <a href="#" class="card bg-zinc-700 border border-zinc-700 hover:shadow-md">
                    <div class="card-body items-center text-center gap-2">
                      <div class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                      </div>
                      <span class="text-sm font-medium">Upload Package</span>
                    </div>
                  </a>
                  <a href="#" class="card bg-zinc-700 border border-zinc-700 hover:shadow-md">
                    <div class="card-body items-center text-center gap-2">
                      <div class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 3h5v5"/><path d="M8 21H3v-5"/><path d="M21 3l-7 7"/><path d="M3 21l7-7"/></svg>
                      </div>
                      <span class="text-sm font-medium">Logout</span>
                    </div>
                  </a>
                </div>
              </div>
            </section>
          </div>
        </main>

        <!-- buat AI-->
        <button class="btn btn-neutral btn-circle fixed right-6 bottom-6">AI</button>
      </div>

      <!-- sidebar nya -->
      <div class="drawer-side">
        <label for="app-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <aside class="w-80 bg-zinc-900 text-neutral-content min-h-full">
          <div class="p-4 border-b border-white/10">
            <div class="flex items-center gap-3">
              <div class="avatar">
                <div class="w-14 rounded-full ring ring-white/20">
                  <img src="" alt="avatar" />
                </div>
              </div>
              <div class="leading-tight">
                <div class="text-lg font-bold">@auth {{ Auth::user()->name }} @else yuhasaju4 @endauth</div>
                <div class="text-sm opacity-80">@auth {{ Auth::user()->email }} @else addhai@gmail.com @endauth</div>
                <div class="text-sm opacity-80">+62 333 666-999</div>
                <div class="mt-1 flex items-center gap-2 text-xs">
                  <a href="#" class="link link-hover">Profile</a>
                  <span class="opacity-50">|</span>
                  @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                      @csrf
                      <button class="link link-hover">Log Out</button>
                    </form>
                  @else
                    <a href="" class="link link-hover">Log In</a>
                  @endauth
                </div>
              </div>
            </div>
          </div>

          <!-- menu buat di sidebar -->
          <ul class="menu p-4 text-sm gap-1">
            <li class="menu-title opacity-80">Main Menu</li>
            <li>
  <a class="active flex items-center gap-3">
    <svg class="w-4 h-4" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path fill="currentColor"
            d="m16 8.5l1.53 1.53-1.06 1.06L10 4.62 3.53 11.09l-1.06-1.06L10 2.5l4 4v-2h2v4zm-6-2.46 6 5.99V18H4v-5.97zM12 17v-5H8v5h4z"/>
    </svg>
    <span>Home</span>
  </a>
</li>

<li>
  <a class="flex items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 56 56">
      <path fill="#ffffff" fill-rule="evenodd" d="m49.336 12.768l1.152 4.298a3.2 3.2 0 0 1-.967 3.22l-.155.13a5.001 5.001 0 0 0 2.218 8.87l.216.033a3.077 3.077 0 0 1 2.575 2.255l1.173 4.376a4 4 0 0 1-2.828 4.9L12.15 51.72a4 4 0 0 1-4.898-2.829l-1.103-4.117a3.485 3.485 0 0 1 .997-3.459l.163-.14a5.001 5.001 0 0 0-2.37-8.813a3.46 3.46 0 0 1-2.791-2.52L1.04 25.709a4 4 0 0 1 2.83-4.899L44.437 9.94a4 4 0 0 1 4.9 2.828m-4.165.607L4.951 24.152c-.555.149-.885.72-.736 1.275l.791 2.953a9.368 9.368 0 0 1 7.2 6.76a9.368 9.368 0 0 1-2.855 9.455l.791 2.953c.15.555.72.885 1.275.736l40.22-10.777c.555-.149.885-.72.736-1.275l-.79-2.952a9.369 9.369 0 0 1-7.2-6.761a9.368 9.368 0 0 1 2.854-9.455l-.791-2.953a1.041 1.041 0 0 0-1.275-.736m-1.283 21.559a3 3 0 1 1-5.796 1.552a3 3 0 0 1 5.796-1.552m-2.07-7.728a3 3 0 1 1-5.796 1.553a3 3 0 0 1 5.795-1.553m-2.071-7.727a3 3 0 1 1-5.796 1.553a3 3 0 0 1 5.796-1.553M29.383 6.347l2.552 3.644c.037.054.073.109.107.164L7.627 16.697L23.812 5.364a4 4 0 0 1 5.57.983"/>
    </svg>
    <span>Create Ticket</span>
  </a>
</li>

<li>
  <a class="flex items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" aria-hidden="true">
      <path fill="#ffffff" d="M5.808 20q-.344 0-.576-.232T5 19.192v-2.634q0-.344.232-.576t.576-.232h6.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zm9.5 0q-.344 0-.576-.232t-.232-.576v-2.634q0-.33.24-.569t.568-.239h2.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zm-9.5-5.25q-.344 0-.576-.232T5 13.942v-2.634q0-.344.232-.576t.576-.232h2.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zm5.5 0q-.344 0-.576-.232t-.232-.576v-2.634q0-.344.232-.576t.576-.232h6.884q.344 0 .576.232t.232.576v2.634q0 .344-.232.576t-.576.232zM6.212 9.5q-.293 0-.376-.27t.133-.457l5.062-3.815q.223-.162.466-.243t.507-.08t.504.08t.461.243l5.062 3.815q.217.187.133.457t-.376.27z"/>
    </svg>
    <span>Booking Room</span>
  </a>
</li>

<li>
  <a class="flex items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 1696 1536" aria-hidden="true">
      <path fill="#ffffff" d="M1671 350q40 57 18 129l-275 906q-19 64-76.5 107.5T1215 1536H292q-77 0-148.5-53.5T44 1351q-24-67-2-127q0-4 3-27t4-37q1-8-3-21.5t-3-19.5q2-11 8-21t16.5-23.5T84 1051q23-38 45-91.5t30-91.5q3-10 .5-30t-.5-28q3-11 17-28t17-23q21-36 42-92t25-90q1-9-2.5-32t.5-28q4-13 22-30.5t22-22.5q19-26 42.5-84.5T372 283q1-8-3-25.5t-2-26.5q2-8 9-18t18-23t17-21q8-12 16.5-30.5t15-35t16-36t19.5-32T504.5 12t36-11.5T588 6l-1 3q38-9 51-9h761q74 0 114 56t18 130l-274 906q-36 119-71.5 153.5T1057 1280H188q-27 0-38 15q-11 16-1 43q24 70 144 70h923q29 0 56-15.5t35-41.5l300-987q7-22 5-57q38 15 59 43zm-1064 2q-4 13 2 22.5t20 9.5h608q13 0 25.5-9.5T1279 352l21-64q4-13-2-22.5t-20-9.5H670q-13 0-25.5 9.5T628 288zm-83 256q-4 13 2 22.5t20 9.5h608q13 0 25.5-9.5T1196 608l21-64q4-13-2-22.5t-20-9.5H587q-13 0-25.5 9.5T545 544z"/>
    </svg>
    <span>Tutorial and Regulation</span>
  </a>
</li>


          </ul>
        </aside>
      </div>
    </div>
  </body>
</html>
