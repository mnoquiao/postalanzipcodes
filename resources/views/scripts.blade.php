<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- app js -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- global script will run here -->
<script>
/* global xhr */
var xhr = null;

/* this will hold an array of user's searches */
var user_searches   = [];

/* this will handle displaying of last searches of user */
if ( null !== localStorage.getItem(`searches`) ) {

    /* retrieve existing user's searches */
    user_searches = JSON.parse(localStorage.getItem(`searches`));

    /*  */
    let user_search_container = document.getElementById(`user-searches`);

    /*  */
    let searches_holder = '';

    /* revese on display for the user see's his last searched */
    user_searches.reverse();

    /*  */
    user_searches.forEach( function(item) {

        searches_holder += `<a href="/search-result?q=${item}" title="${item}">
                                <span class="cursor-pointer opacity-70 hover:opacity-100 inline-flex items-center rounded-md bg-blue-100 px-3.5 py-1.5 text-sm font-medium text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>

                                    ${item}
                                </span>
                            </a>`;

    })

    /*  */
    if ( null !== user_search_container) { user_search_container.innerHTML = searches_holder; }

}



/* this function will handle the saving or user's searches into localStorage */
function saveSearchLocal(u_search) {

    /* first record of this user search */
    let q_              = u_search.trim();

    /* only process search with length value */
    if (q_.length > 0) {

        if ( null !== localStorage.getItem(`searches`) ) {

            /* retrieve existing user's searches */
            user_searches = JSON.parse(localStorage.getItem(`searches`));

            /* array length is 5 or more remove first item of the array */
            if ( user_searches.length > 4 ) {
                user_searches.shift();
            }

            /* push user search into array */
            user_searches.push(q_);

            /* store user search */
            localStorage.setItem(`searches`, JSON.stringify(user_searches));

        }
        else {

            /* add user search into array */
            user_searches = [q_];

            /* store user search */
            localStorage.setItem(`searches`, JSON.stringify(user_searches));

        }

    }
}
</script>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6ZNGZV1Q47"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6ZNGZV1Q47');
</script>
