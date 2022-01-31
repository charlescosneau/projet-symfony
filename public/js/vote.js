let votes = document.querySelectorAll(".js-vote button");

votes.forEach(function (vote){
    vote.addEventListener('click', function(e){
        e.preventDefault();
        console.log(e.currentTarget);
        let direction = e.currentTarget.dataset.direction;
        let users_id = e.currentTarget.dataset.id;
        // let pill = document.querySelector(e.currentTarget).parentNode.find('.vote-total');


        let request = new XMLHttpRequest();
        request.open('POST', 'http://127.0.0.1:8000/users/' + users_id + '/vote', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded, charset=UTF-8');
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let response = this.responseText;
            }
        };
        let data = {direction: direction};
        request.send(JSON.stringify(data));
    });
})


