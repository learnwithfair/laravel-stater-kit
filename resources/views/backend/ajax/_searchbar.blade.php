<script>
    var items = [
        [
            "Account settings",
            "<i class='mdi mdi-settings text-primary'></i>",
            "{{ route('profile.show') }}",
        ],

        [
            "Change Password",
            " <i class='mdi mdi-onepassword text-info'></i>",
            "{{ route('profile.show') }}",
        ],

        [
            "Dashboard",
            "<i class='mdi mdi-speedometer text-info'></i>",
            "{{ route('admin.dashboard') }}",
        ],
        [
            "Home",
            "<i class='mdi mdi-home text-primary'></i>",
            "{{ route('home') }}",
        ],

       
        [
            "Leaves",
            "<i class='mdi mdi-email text-info'></i>",
            "{{ route('leaves.index') }}",
        ],


        [
            "Profile",
            "<i class='mdi mdi-account-circle text-info'></i>",
            "{{ route('profile.show') }}",
        ],






    ];
    //Sort names in ascending order
    let sortedNames = items.sort();

    //reference
    let input = document.getElementById("itemSearch");

    //Execute function on keyup
    input.addEventListener("keyup", (e) => {
        let r = document.getElementById("searchdisplay");
        console.log(r);
        if (input.value == '') {
            r.style.display = 'none';
        } else {
            r.style.display = 'inline-block';
        }

        let data = '';
        for (let i of sortedNames) {
            //convert input to lowercase and compare with each string
            if (
                i[0].toLowerCase().startsWith(input.value.toLowerCase()) &&
                input.value != ""
            ) {
                //display the value in array
                // listItem.innerHTML = word;
                let word = "<span class='text-white'>" + i[0].substr(0, input.value.length) + "</span>";
                word += i[0].substr(input.value.length);
                //create li element
                data = data + '<a href="' + i[2] + '" class="dropdown-item preview-item p-2 cursor-pointer">\
                            <div class="preview-thumbnail">\
                                <div class="preview-icon bg-dark rounded-circle">\
                                   ' + i[1] + '\
                                </div>\
                            </div>\
                            <div class="preview-item-content">\
                                <p class="text-muted ellipsis pt-3 list-items">' + word + '</p>\
                            </div>\
                        </a>\
                        <div class="dropdown-divider m-0"></div>';
            }

        }
        if (data == '') {
            data = '<a class="dropdown-item preview-item p-2">\
        <div class="preview-thumbnail">\
            <div class="preview-icon bg-dark rounded-circle">\
            <i class="mdi mdi-calendar text-danger"></i>\
            </div>\
        </div>\
        <div class="preview-item-content">\
            <p class="text-danger ellipsis pt-3 list-items">Whoops!! No Result Found.</p>\
        </div>\
    </a>\
    <div class="dropdown-divider m-0"></div>';
            document.querySelector(".listt").innerHTML = data;
        }

        document.querySelector(".listt").innerHTML = data;
    });
</script>
