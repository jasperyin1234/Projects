<x-basic-layout>
    @include('partials._adminnavbar')

</x-basic-layout>

<div class="admin_module">
    <h1 class="flex py-5 lg:px-20 md:px-10 px-5 lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-gray-800">Reported Listings</h1>

    @if ($reportedListings->isEmpty())
    <p>No reported listings found.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Website</th>
                <th>Description</th>
                <th>Posting Date</th>
                <th>Verify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportedListings as $listing)
            <tr>
                <td>{{ $listing->title }}</td>
                <td>{{ $listing->company }}</td>
                <td>{{ $listing->website }}</td>
                <td>{{ $listing->description }}</td>
                <td>{{ $listing->created_at }}</td>
                <td>
                    <form method="POST" action="{{ route('verifyListing', ['id' => $listing->id]) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="verify-button">Verify</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('deleteListing', ['id' => $listing->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>