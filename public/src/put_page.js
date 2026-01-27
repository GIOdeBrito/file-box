
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

		bsubmit.disabled = true;

		const file = fileInput.files[0];

		const uploader = new FileUploader();
		uploader.attach(file);
		uploader.url('/api/v1/storage/upload');

		uploader.onprogress((ev) =>
		{
			setMeterValue(ev.loaded / ev.total);
		});

		uploader.onload((ev) =>
		{
			bsubmit.disabled = false;
			fileInput.value = "";
		});

		uploader.send();
	});
}

function setMeterValue (value)
{
	document.querySelector('[data-name="progress-bar"]').value = value;
}
