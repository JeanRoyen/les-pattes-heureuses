<form action="{{ route('logout') }}"
      method="post">
    @csrf
    <button type="submit" class="bg-red-600 text-white py-3 px-4 rounded-button mt-16 cursor-pointer">
        <span>Se déconnecter</span>
    </button>
</form>
