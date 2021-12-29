$(document).ready(function () {

    var host = window.location.origin;
    let route = "assets/data/trainings.json";
    let file = host + "/" + route;

    get_schedule(file)
    main_page_schedule(file)

    function get_schedule(source) {
        // FETCHING DATA FROM JSON FILE

        $.getJSON(source,
            function (data) {
            var htmlString = '';

            data.sort((a, b) => {
                return new Date(a.from) - new Date(b.from); // descending
            })

            // data.sort((a, b) => {
            //     return new Date(b.from) - new Date(a.from); // ascending
            //   })

            // ITERATING THROUGH OBJECTS
            $.each(data, function (key, value) {

                if (value.type === 'Event') return;
                // CONSTRUCTION OF ROWS HAVING
                // DATA FROM JSON OBJECT
                htmlString += '<tr>';

                htmlString += '<td>' +
                    (key + 1) + '</td>';

                htmlString += '<td>' +
                    value.subject + '</td>';

                htmlString += '<td>' +
                    value.type + '</td>';

                htmlString += '<td>' +
                    value.duration + '</td>';

                htmlString += '<td>' +
                    value.from + '</td>';

                htmlString += '<td>' +
                    value.to + '</td>';

                htmlString += '<td>' +
                    value.levelofparticipant + '</td>';

                htmlString += '<td>' +
                    value.modeoftraining + '</td>';

                htmlString += '<td>' +
                    value.mobile + '</td>';

                htmlString += '</tr>';
            });

            $('table#schedule').append(htmlString);
        });
    }

    function main_page_schedule(source) {
        $.getJSON(source,
            function (data) {
            var htmlString = '';

            data.sort((a, b) => {
                return new Date(a.from) - new Date(b.from); // descending
            })

            data = $.map(data,function(val,key) {
                if(new Date(val.to) >= new Date()) return val;
             });

            $.each(data, function(index, value){
                let day = '';
                let dayt = '';
                let month = '';
                let link = '';

                let dm = value.from.split('-');
                let dt = value.to.split('-');

                day = dm[0];
                month =  dm[1];
                dayt = dt[0];
                if (value.link) link = value.link;
                else link = "notice.html";

                if (index > 2) return false;

                htmlString += '<div class="col-md-4 col-sm-4 col-xs-12">';
                htmlString += '<!-- Single Blog -->';
                htmlString += '<div class="single-news">';
                htmlString += '<div class="news-head" style="height: 50px;">';
                htmlString += '</div>';
                htmlString += '<div class="news-body">';
                htmlString += '<div class="news-content">';
                htmlString += '<div class="date"><span>' + day + '-' + dayt + '</span>' + month + '</div>';
                htmlString += '<h2><a href="notice.html">' + value.subject + '</a></h2>';
                htmlString += '<p class="text">' + value.levelofparticipant + '</p>';
                htmlString += '<a href="' + link + '" class="btn">Read More<i class="fas fa-angle-right"></i></a>';
                htmlString += '</div>';
                htmlString += '</div>';
                htmlString += '</div>';
                htmlString += '<!-- End Single Blog -->';
                htmlString += '</div>';
            });

            $('#schedule-three').append(htmlString);
        });
    }
});