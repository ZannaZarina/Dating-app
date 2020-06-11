{{ $authUser->first_name }} You have a match with {{ $user->first_name }} ! Check
<a href=" {{ route('gallery', $user) }} "> {{ $user->first_name }}'s </a> gallery
