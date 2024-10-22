<div class="requests">
    <div class="filter">
        <div class="row height d-flex justify-content-left align-items-left">
            <div class="col-md-6">
                <div class="form">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control form-input" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="tableactions">
            <div id="divide">
                <i class="bi bi-arrow-left-short"></i>
                <i class="bi bi-arrow-right-short" id="iconborder"></i>
                <div class="dropdown" style="float:right;">
                    <button class="dropbtn"><i class="bi bi-filter"></i></button>
                    <form id="filterForm" method="GET" action="{{ route('fetchSortedRequests') }}">
                        <div class="dropdown-content">
                            <p id="filterlabel">Filter By</p>
                            <hr>
                            <p>Status</p>
                            <a>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Pending
                                    </label>
                                </div>
                            </a>
                            <a>
                                <div class="form-check" id="margincheck">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Approved and Ongoing
                                    </label>
                                </div>
                            </a>
                            <hr>
                            <div class="buttons">
                                <button class="cancelbtn">Remove</button>
                                <button class="applybtn">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    {{-- display the table of vehicle requests --}}
    <div class="tabview">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date Requested</th>
                <th scope="col">Destination</th>
                <th scope="col">Purpose</th>
                <th scope="col">Requesting Office</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Availability</th>
                <th scope="col">Form Status</th>
                <th scope="col">Event Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @php
                $filteredRequests = App\Models\VehicleRequest::whereIn('FormStatus', ['Approved', 'Pending'])
                    ->whereIn('EventStatus', ['Ongoing', '-'])
                    ->get();
            @endphp

{{--                <th scope="row">20210522</th>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>Rawr</td>--}}
{{--                <td>--}}
{{--                    <a href="{{ route('VehicledetailEdit') }}"><i class="bi bi-pencil" id="actions"></i></a>--}}
{{--                    <i class="bi bi-download" id="actions"></i>--}}
{{--                </td>--}}

                @foreach($filteredRequests as $request)
                    <tr>
                        <th scope="row">{{ $request->VRequestID }}</th>
                        <td>{{ $request->created_at->format('m-d-Y') }}</td>
                        <td>{{ $request->destination }}</td>
                        <td>{{ $request->purpose }}</td>
                        <td>{{ $request->office->OfficeName }}</td>
                        <td>{{ $request->date_start }}</td>
                        <td>{{ $request->time_start }}</td>
                        <td>{{ $request->vehicle->Availability }}</td>
                        <td><span class="{{ strtolower($request->FormStatus) }}">{{ $request->FormStatus }}</span></td>
                        <td>{{ $request->EventStatus }}</td>
                        <td>
                            <a href="{{ route('VehicleDetailedit', $request->VRequestID) }}"><i class="bi bi-pencil" id="actions"></i></a>
                            <i class="bi bi-download" id="actions"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="end"></div>
<<<<<<< Updated upstream
=======

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentPage = 1;
        const itemsPerPage = 10;
        let lastPage = 1;
        let searchQuery = '';

        function fetchSortedData(order = 'desc', page = currentPage, search = searchQuery) {
            const form = document.getElementById('filterForm');
            const formData = new FormData(form);

            // Append necessary data
            formData.append('order', order);
            formData.append('sort', 'created_at');
            formData.append('page', page);
            formData.append('per_page', itemsPerPage);
            formData.append('search_query', search);

            // Serialize the form data into query parameters
            const params = new URLSearchParams();
            formData.forEach((value, key) => {
                params.append(key, value);
            });

            // Fetch data with search and sort applied
            fetch(`/fetchSortedVRequests?${params.toString()}`)
                .then(response => response.json())
                .then(data => {
                    updateTable(data.data, data.pagination);
                    currentPage = data.pagination.current_page;
                    lastPage = data.pagination.last_page;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        // Function to update the table with the fetched data
        function updateTable(data, pagination) {
            console.log('updateTable called with data:', data);
            console.log('updateTable called with pagination:', pagination);

            let tbody = document.querySelector('tbody');
            tbody.innerHTML = '';

            if (Array.isArray(data) && data.length > 0) {
                console.log('Data is an array with', data.length, 'items');
                data.forEach(request => {
                    let formStatusClass = '';
                    switch (request.FormStatus.toLowerCase()) {
                        case 'approved':
                            formStatusClass = 'approved';
                            break;
                        case 'for approval':
                            formStatusClass = 'for-approval';
                            break;
                        case 'pending':
                            formStatusClass = 'pending';
                            break;
                    }

                    let officeName = request.office ? request.office.OfficeName : 'N/A';
                    let purposeName = request.PurposeOthers || request.PurposeID || 'N/A';

                    let row = `
                    <tr>
                      <th scope="row">${request.VRequestID}</th>
                      <td>${new Date(request.created_at).toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: '2-digit',
                                    day: '2-digit'
                                })} ${new Date(request.created_at).toLocaleTimeString('en-US', {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                })}</td>
                      <td>${request.Destination}</td>

                    {{--<td>{{ isset($request) ? optional(App\Models\PurposeRequest::find($request->PurposeID))->purpose ?? $request->PurposeOthers : '' }}</td>--}}
                      <td>${officeName}</td>
                      <td>${request.date_start}</td>
                      <td>${request.time_start}</td>
                      <td><span class="${formStatusClass}">${request.FormStatus}</span></td>
                      <td>${request.EventStatus}</td>
                      <td>
                        <a href="/vehiclerequest/${request.VRequestID}/edit"><i class="bi bi-pencil" id="actions"></i></a>
                      </td>
                    </tr>`;

                    tbody.insertAdjacentHTML('beforeend', row);
                });
            } else {
                console.log('No data found');
                tbody.innerHTML = '<tr><td colspan="10">No requests found.</td></tr>';
            }

            updatePagination(pagination);
        }

        // Function to handle pagination
        function updatePagination(pagination) {
            const paginationContainer = document.querySelector('.pagination_rounded ul');
            paginationContainer.innerHTML = ''; // Clear the current pagination

            // Previous button
            let prevDisabled = pagination.current_page <= 1 ? 'disabled' : '';
paginationContainer.insertAdjacentHTML('beforeend', `<li><a href="#" class="prev ${prevDisabled}">Prev</a></li>`);

// Page numbers
for (let page = 1; page <= pagination.last_page; page++) {
    if (page === pagination.current_page || 
        page === pagination.current_page - 1 || 
        page === pagination.current_page - 2 || 
        page === pagination.current_page + 1 || 
        page === pagination.current_page + 2) {
        
        let activeClass = page === pagination.current_page ? 'active' : '';

        // Create the list item element
        let listItem = document.createElement('li');
        listItem.className = activeClass;

        // Create the anchor element
        let pageLink = document.createElement('a');
        pageLink.href = '#';
        pageLink.textContent = page;

        // If it's the current page, change the font color
        if (page === pagination.current_page) {
            pageLink.style.color = 'white';  // Change font color to white (or any color you prefer)
            pageLink.style.backgroundColor = '#4285f4'; // Change background color to the desired active color
        }

        // Append the anchor to the list item
        listItem.appendChild(pageLink);

        // Append the list item to the pagination container
        paginationContainer.appendChild(listItem);
    }
}

// Next button
let nextDisabled = pagination.current_page >= pagination.last_page ? 'disabled' : '';
paginationContainer.insertAdjacentHTML('beforeend', `<li><a href="#" class="next ${nextDisabled}">Next</a></li>`);
        }

        // Event listeners for pagination links
        document.querySelector('.pagination_rounded').addEventListener('click', function (e) {
            if (e.target.tagName === 'A') {
                e.preventDefault();
                let text = e.target.textContent.trim();

                if (text === 'Prev' && currentPage > 1) {
                    fetchSortedData('desc', currentPage - 1, searchQuery);
                } else if (text === 'Next' && currentPage < lastPage) {
                    fetchSortedData('desc', currentPage + 1, searchQuery);
                } else if (!isNaN(text)) {
                    fetchSortedData('desc', parseInt(text), searchQuery);
                }
            }
        });

        // Sort by date when clicking on the "Sort" button
        document.getElementById('sort-date-requested').addEventListener('click', function (e) {
            e.preventDefault();
            let order = this.getAttribute('data-order');
            let newOrder = order === 'asc' ? 'desc' : 'asc';
            this.setAttribute('data-order', newOrder);
            fetchSortedData(newOrder, currentPage, searchQuery);
        });

        // Handle form submission and search
        document.getElementById('filterForm').addEventListener('submit', function (event) {
            event.preventDefault();
            searchQuery = document.querySelector('.form-input').value.trim(); // Update searchQuery from the input field
            fetchSortedData(document.getElementById('sort-date-requested').getAttribute('data-order'), currentPage, searchQuery);
        });

        // Handle reset functionality
        document.querySelector('.cancelbtn').addEventListener('click', function () {
            document.getElementById('filterForm').reset();
            searchQuery = ''; // Reset searchQuery
            fetchSortedData(document.getElementById('sort-date-requested').getAttribute('data-order'));
        });

        // Instant search functionality while typing
        document.querySelector('.form-input').addEventListener('input', function () {
            searchQuery = this.value.trim(); // Update searchQuery on input change
            fetchSortedData(document.getElementById('sort-date-requested').getAttribute('data-order'), currentPage, searchQuery);
        });

        // Initial fetch when page loads
        fetchSortedData();
    });
</script>
>>>>>>> Stashed changes
