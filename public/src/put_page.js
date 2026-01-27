
import FileUploader from "./file_upload.js";

window.addEventListener('load', function ()
{
	setControls();
});

function setControls ()
{
	const fileInput = document.querySelector('[data-name="file-input"]');

	const bsubmit = document.querySelector('[data-name="bsubmit"]');

	bsubmit.addEventListener('click', (ev) =>
	{
		ev.preventDefault();

		const file = fileInput.files[0];

		const uploader = new FileUploader();
		uploader.attach(file);
		uploader.url('/api/v1/storage/upload');
		uploader.send();
	});
}
