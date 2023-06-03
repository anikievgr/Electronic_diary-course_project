var value;
window.onload = function() {
    value = 'all'
    ajax(0, value,)
};
let num = 20
var input = document.querySelector('.search').querySelector('input')
window.addEventListener('scroll', function() {
    if (window.innerHeight + window.pageYOffset >= document.body.offsetHeight) {
        let value = input.value
        if (value === ''){
            value = 'all'
        }
        num = num + 20
        ajax(num, value,)

    }
});
input.addEventListener('input', function (evt) {
    var parentElement = document.getElementById('answerBack');
    parentElement.innerHTML = '';
    let value = input.value
    if (value === ''){
        value = 'all'
    }
    num = 0
    ajax(num, value)
})
function ajax(num, value) {
    $.ajax({
        url: '/api/searchTest',
        type: 'POST',
        data: {list: num, search: value},
    }).done(function (data) {
        console.log(data)
        let parent = document.getElementById('answerBack');

        for (var index = 0; index < data.length; ++index) {
            let newCard = document.createElement('a');
            newCard.href = '/searchTests/redirect/'+data[index]['id']
            newCard.classList.add('card', 'testsBack');
            newCard.innerHTML = `
                                    <div>
                                        <p>` + data[index]?.name + `</p>
                                        <p>` + data[index]?.time + `m</p>
                                    </div>
                                    <div>
                                        <p>` + data[index]?.user?.name + `</p>
                                        <p>` + data[index]?.user?.email + `</p>
                                    </div>
                                    `;
            parent.appendChild(newCard);
        }
    })
}
