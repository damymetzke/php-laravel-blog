// I have to this because for some fucking reason typescript assumes I'm going to load all the source files at once.
// The reason I use different files is BECAUSE I don't want to mix them stupid compiler.
// At LEAST just make it an option, I do not want to have to add this line just to circumvent the compiler, it's ugly.
export {}
const CREATE_BUTTON = <HTMLButtonElement>document.getElementById('create-post');

const TITLE_ELEMENT = <HTMLInputElement>document.getElementById('input-title');
const BODY_ELEMENT = <HTMLInputElement>document.getElementById('input-body');

const POST_URL = '/api/post';

CREATE_BUTTON.addEventListener('click', ()=>{
    const request = new XMLHttpRequest();

    request.onreadystatechange = (): void => {
        if (request.readyState == 4 && request.status == 200) {
            var data = request.responseText;
            console.log(data);
        }
    };

    
    request.open("POST", POST_URL, true);

    request.setRequestHeader('Content-Type', 'application/json');

    request.send(JSON.stringify({
        title: TITLE_ELEMENT.value,
        body: BODY_ELEMENT.value,
        slug: TITLE_ELEMENT.value.toLowerCase().replace(/^[0-9]*/, '').replace(/[ _]/g, '-').replace(/[^a-z0-9\-]/, "")
    }));
})