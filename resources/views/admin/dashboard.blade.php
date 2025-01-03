<x-authenticated-layout class="Admin_dashboard">
    <section class="Hero">
        <p>Hi {{ Auth::user()->first_name }}</p>
    </section>

    <section class="Stats">
        <div class="stat">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="text">
                <span>{{ $count_admins }}</span>
                <a href="{{ route('users.index') }}">Admins</a>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="text">
                <span>{{ $count_teachers }}</span>
                <a href="{{ route('users.index') }}">Teachers</a>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="text">
                <span>{{ $count_students }}</span>
                <a href="{{ route('students.index') }}">Students</a>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="text">
                <span>{{ $count_parents }}</span>
                <a href="{{ route('parents.index') }}">Parents</a>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-blog"></i>
            </div>
            <div class="text">
                <span>{{ $count_blogs }}</span>
                <a href="{{ route('blogs.index') }}">Blogs</a>
            </div>
        </div>

        <div class="stat">
            <div class="icon">
                <i class="fas fa-comment"></i>
            </div>
            <div class="text">
                <span>{{ $count_user_messages }}</span>
                <a href="{{ route('user-messages.index') }}">Messages</a>
            </div>
        </div>
    </section>
</x-authenticated-layout>
