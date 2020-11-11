import getMetaData from "./shared/get-meta-data.ts";

const UPDATE_BUTTON = <HTMLButtonElement>document.getElementById('update-post');
const DELETE_BUTTON = <HTMLButtonElement>document.getElementById('delete-post');

const TITLE_ELEMENT = <HTMLInputElement>document.getElementById('post-title');
const BODY_ELEMENT = <HTMLTextAreaElement>document.getElementById('post-body');

const POST_ID = (<HTMLInputElement>document.getElementById('post-id')).value;

const POST_URL = `/admin/post/${POST_ID}`;

DELETE_BUTTON.addEventListener("click", ()=>{
    const request = new XMLHttpRequest();

    request.onreadystatechange = (): void => {
        if (request.readyState == 4 && request.status == 200) {
            const data = JSON.parse(request.responseText);
            if('success' in data && data.success === true)
            {
                window.location.href = "/admin";
            }
        }
    };

    request.open("DELETE", POST_URL, true);

    request.setRequestHeader('X-CSRF-TOKEN', getMetaData('csrf-token'));

    request.send();
});

UPDATE_BUTTON.addEventListener("click", ()=>{
    const request = new XMLHttpRequest();

    request.onreadystatechange = (): void => {
        if (request.readyState == 4 && request.status == 200) {
            var data = request.responseText;
            console.log(data);
        }
    };

    
    request.open("PATCH", POST_URL, true);

    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('X-CSRF-TOKEN', getMetaData('csrf-token'));

    request.send(JSON.stringify({
        title: TITLE_ELEMENT.value,
        body: BODY_ELEMENT.value
    }));
});