
// File uploading module

class FileUploader
{
	#formdata;
	#ajax;

	#url;

	constructor ()
	{
		this.#formdata = new FormData();
		this.#ajax = new XMLHttpRequest();
	}

	attach (file, name = 'attachment')
	{
		this.#formdata.append(name, file);
	}

	url (value)
	{
		this.#url = value;
	}

	onprogress (func)
	{
		this.#ajax.upload.addEventListener('progress', func, false);
	}

	onabort (func)
	{
		this.#ajax.addEventListener('abort', func, false);
	}

	onerror (func)
	{
		this.#ajax.addEventListener('error', func, false);
	}

	onload (func)
	{
		this.#ajax.addEventListener('load', func, false);
	}

	send ()
	{
		const ajax = this.#ajax;

		ajax.open("POST", this.#url);
		ajax.send(this.#formdata);
	}
}

export default FileUploader;
