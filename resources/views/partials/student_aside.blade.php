<aside>
    <div class="brand">
        <div class="profile">
            <a href="{{ route('home') }}">
                <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('assets/images/default_profile.jpg') }}" alt="Student Image" style="max-width: 100px;">
            </a>
            <span class="text">
                <a href="{{ route('profile.edit') }}">{{ $student->first_name . ' ' . $student->last_name }}</a>
                <span>{{ $student->registration_number }}</span>
            </span>
        </div>
    </div>

    @php
        $nav_links = [
            [
                'route' => 'student-details',
                'icon' => 'fas fa-home',
                'text' => 'Home',
            ],
            [
                'route' => 'student-results',
                'icon' => 'fas fa-brain',
                'text' => 'Perfomance',
            ],
            [
                'route' => 'student-assignments',
                'icon' => 'fas fa-brain',
                'text' => 'Assignments',
            ],
            [
                'route' => 'student-payments',
                'icon' => 'fas fa-money-bill-alt',
                'text' => 'Payments',
            ],
            [
                'route' => 'student-leaveouts',
                'icon' => 'fas fa-calendar-minus',
                'text' => 'Leaveouts',
            ],
            [
                'route' => 'student-disciplinaries',
                'icon' => 'fas fa-balance-scale-right',
                'text' => 'Disciplinaries',
            ],
            [
                'route' => 'student-textbooks',
                'icon' => 'fas fa-book',
                'text' => 'Textbooks',
            ],
        ];
    @endphp

    <ul class="links">
        @foreach ($nav_links as $link)
            <li class="link {{ Route::currentRouteName() === $link['route'] ? 'active' : '' }}">
                <a href="{{ route($link['route']) }}">
                    <i class="{{ $link['icon'] }}"></i>
                    <span class="text">{{ $link['text'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="footer">
        <div class="logout">
            <form action="{{ route('student_logout') }}" method="post">
                @csrf

                <button type="submit">
                    <span class="text">Logout</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
