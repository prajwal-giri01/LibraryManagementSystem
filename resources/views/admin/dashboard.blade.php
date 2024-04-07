<x-app-layout>
    @include('layouts.navigation')

    <section class="ad_main d-flex">
        <div class="ad_sidebar col-2">
            <ul class="ad_menu">
                <li>
                    <a href="#"><i class="fa-solid fa-grip"></i>Dashboard</a>
                </li>

                <li>
                    <a href="#"> <i class="fa-regular fa-user "></i>Author</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-layer-group"></i>Genre</a>
                </li>
                <li>
                    <a href="#"> <i class="fa-solid fa-book"></i>Books</a>
                </li> <li>
                    <a href="#"><i class="fa-regular fa-address-card"></i>Membership</a>
                </li>

            </ul>
        </div>
        <div class="ad_displayDetails col-10">
            <div class="detail_top">
                <h2>Author</h2>
            </div>
            <div class="detail_content">
                <div class="cta_container">
                    <a href="#"><i class="fa-solid fa-trash"></i></a>
                    <a href="#"><i class="fa-solid fa-plus"></i></a>
                </div>
                <div class="event_container">
                    <table>
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Post By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Title Name</td>
                            <td>20/5/2024</td>
                            <td>admin</td>
                            <td>event invitation</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
