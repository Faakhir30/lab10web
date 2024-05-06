@props(['type'])
<div class="w-full h-screen flex items-center justify-center bg-indigo-100">
    <form class="w-full md:w-1/3 rounded-lg"  method="POST"
        action="/{{$type}}"
    >
        @csrf
      
      <h2 class="text-2xl text-center text-gray-800 mb-8">
        @if ($type == 'login')
            Login
        @else
            Register
        @endif
      </h2>
      <div class="px-12 pb-10">
        @if ($type == 'register')
        <div class="w-full mb-2">
            <div class="flex items-center">
                <input
                    type="text"
                    placeholder="Full Name"
                    class="
                    w-full
                    border
                    rounded
                    px-3
                    py-2
                    text-gray-700
                    focus:outline-none
                    "
                    name="name"
                    value="{{ old('name') }}"
                />
            </div>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        @endif
        <div class="w-full mb-2">
          <div class="flex items-center">
            <input
              type="text"
              placeholder="Email Address"
              class="
                w-full
                border
                rounded
                px-3
                py-2
                text-gray-700
                focus:outline-none
              "
              name="email"
            value="{{ old('email') }}"
            />
        </div>
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        </div>
        <div class="w-full mb-2">
          <div class="flex items-center">
            <input
              type="password"
              placeholder="Password"
              class="
                w-full
                border
                rounded
                px-3
                py-2
                text-gray-700
                focus:outline-none
              "
              name="password"
              value={{ old('password') }}
            />
        </div>
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        </div>
        @if ($type == 'register')
        <div class="w-full mb-2">
          <div class="flex items-center">
            <select
              class="
                w-full
                border
                rounded
                px-3
                py-2
                text-gray-700
                focus:outline-none
              "
              name="role"
            >
              <option value="">Select Role</option>
              <option value="student">Student</option>
              <option value="teacher">Teacher</option>
            </select>
            @error('role')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>
        @endif
        <button
          type="submit"
          class="
            w-full
            py-2
            mt-8
            rounded-full
            bg-blue-400
            text-gray-100
            focus:outline-none
          "
        >
            @if ($type == 'login')
                Login
            @else
                Register
            @endif
        </button>
        @if ($type == 'login')
        <a href="/register" class="block text-center mt-8 text-xs text-gray-700">
            Don't have an account? Register Now
        </a>
        @else
        <a href="/login" class="block text-center mt-8 text-xs text-gray-700">
            Already have an account? Login Now
        </a>
        @endif
      </div>
    </form>
  </div>

