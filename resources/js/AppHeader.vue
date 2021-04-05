<template>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">
      <inertia-link href="/" class="text-dark">Laravel-Inertia-Vue demo</inertia-link>
    </h5>
    
    <ul class="nav">
      <li class="nav-item">
        <inertia-link :href="$route('dashboard')" class="p-2 text-dark">Dashboard</inertia-link>
      </li>
      <li class="nav-item">
        <inertia-link :href="$route('events.create')" class="p-2 text-dark">Create event</inertia-link>
      </li>
      <li class="nav-item">
        <inertia-link :href="$route('events.index')" class="p-2 text-dark">List of event</inertia-link>
      </li>
    </ul>
    <div class="dropdown">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $page.props.user.name }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <inertia-link :href="$route('events.index')" class="dropdown-item">Profile</inertia-link>
        <inertia-link :href="$route('mypage.events')" class="dropdown-item">My event</inertia-link>
        <inertia-link :href="$route('logout')" method="post" as="button" type="button" class="dropdown-item">Logout</inertia-link>
        <!-- <a class="dropdown-item" href="#">Logout</a> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AppHeader',
  // components : {JetDropdown, JetDropdownLink}
}
</script>