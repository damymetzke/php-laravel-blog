
const UPDATE_BUTTON = <HTMLButtonElement>document.getElementById('update-post');
const DELETE_BUTTON = <HTMLButtonElement>document.getElementById('delete-post');

const POST_ID = (<HTMLInputElement>document.getElementById('post-id')).value;

const DELETE_URL = `/api/post/${POST_ID}`;

DELETE_BUTTON.addEventListener("click", ()=>{
    const request = new XMLHttpRequest();

    request.onreadystatechange = (): void => {
        if (request.readyState == 4 && request.status == 200) {
            var data = request.responseText;
            console.log(data);
        }
    };

    request.open("DELETE", DELETE_URL, true);
    request.send();
});