<!DOCTYPE html>
<html>
<head>
    <title>My Python Compiler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-blue-600">Python Online Compiler</h1>
        
        <textarea id="codeEditor" class="w-full h-48 p-4 font-mono text-sm bg-gray-900 text-green-400 rounded-md focus:outline-none" placeholder="Tulis kode Python di sini...">print("Hello World!")</textarea>
        
        <button onclick="runCode()" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md font-semibold">
            Run Code
        </button>

        <div class="mt-6">
            <h3 class="font-bold text-gray-700">Output:</h3>
            <pre id="outputArea" class="mt-2 p-4 bg-gray-200 rounded-md min-h-[50px] font-mono text-sm text-gray-800"></pre>
        </div>
    </div>

    <script>
       async function runCode() {
    const editor = document.getElementById('codeEditor');
    const outputArea = document.getElementById('outputArea');
    
    // 1. Ambil nilai dari textarea
    const codeValue = editor.value;

    // Cek di Console F12, harusnya muncul kode python-mu
    console.log("Kode yang dikirim:", codeValue); 

    outputArea.innerText = "Processing...";
    outputArea.style.color = "gray";

    try {
        const response = await fetch('/run-python', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            // 2. Pastikan format JSON-nya benar
            body: JSON.stringify({ code: codeValue })
        });

        const data = await response.json();
        console.log("Respon Server:", data);

        // 3. Tampilkan hasil
        if (data.error) {
            outputArea.style.color = "red";
            outputArea.innerText = data.error + (data.output ? "\n" + data.output : "");
        } else {
            outputArea.style.color = "black";
            outputArea.innerText = data.output || "Program selesai tanpa output.";
        }

    } catch (e) {
        console.error("Fetch Error:", e);
        outputArea.innerText = "Error koneksi: " + e.message;
    }
}
    </script>
</body>
</html>