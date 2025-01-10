<div class="min-h-screen bg-white text-base-content">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex flex-col lg:flex-row flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-base-200 dark:bg-gray-800 p-4 overflow-y-auto">
            <h2 class="text-lg font-semibold mb-4 text-base-content dark:text-gray-100">API Endpoints</h2>
            <ul class="menu bg-base-200 dark:bg-gray-800 rounded-box">
                <li>
                    <a class="text-base-content dark:text-gray-100">
                        <i class="fas fa-user"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a class="text-base-content dark:text-gray-100">
                        <i class="fas fa-shopping-cart"></i>
                        Products
                    </a>
                </li>
                <li>
                    <a class="text-base-content dark:text-gray-100">
                        <i class="fas fa-box"></i>
                        Orders
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 overflow-y-auto bg-white dark:bg-gray-900 text-base-content dark:text-gray-100">
            <div x-data="{
                selectedMethod: 'GET',
                endpoints: {
                    GET: '{{ url($apiDetail->get_endpoint) }}',
                    POST: '{{ url($apiDetail->post_endpoint) }}',
                    PUT: '{{ url($apiDetail->update_endpoint) }}',
                    DELETE: '{{ url($apiDetail->delete_endpoint) }}'
                },
                get currentEndpoint() {
                    return this.endpoints[this.selectedMethod];
                }
            }">
                <div class="mb-4">
                    <select class="select select-bordered w-full max-w-xs dark:bg-gray-800 dark:text-gray-100" x-model="selectedMethod">
                        <option value="GET">GET</option>
                        <option value="POST">POST</option>
                        <option value="PUT">PUT</option>
                        <option value="DELETE">DELETE</option>
                    </select>
                </div>
                <div class="mb-4">
                    <input type="text" placeholder="API Endpoint"
                           class="input input-bordered w-full dark:bg-gray-800 dark:text-gray-100"
                           :value="currentEndpoint" readonly />
                </div>
            </div>
            <div class="mb-4">
                <textarea class="textarea textarea-bordered w-full bg-white text-black dark:bg-gray-800 dark:text-gray-100"
                          placeholder="Headers"></textarea>
            </div>
            <div class="mb-4">
                <textarea class="textarea textarea-bordered w-full dark:bg-gray-800 dark:text-gray-100"
                          placeholder="Query Parameters"></textarea>
            </div>
            <div class="mb-4">
                <textarea class="textarea textarea-bordered w-full dark:bg-gray-800 dark:text-gray-100"
                          placeholder="Request Body"></textarea>
            </div>
            <button class="btn btn-primary">Send Request</button>
        </main>

        <!-- Response Sidebar -->
        <aside class="w-full lg:w-96 bg-base-200 dark:bg-gray-800 p-4 overflow-y-auto">
            <h2 class="text-lg font-semibold mb-4 text-base-content dark:text-gray-100">Response</h2>
            <pre class="bg-white dark:bg-gray-900 p-4 rounded text-base-content dark:text-gray-100 overflow-x-auto">
<code class="language-json">{
  "status": "success",
  "data": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
  }
}</code></pre>
        </aside>
    </div>

    <!-- Footer -->
    <footer class="bg-neutral dark:bg-gray-800 text-neutral-content dark:text-gray-100 p-4">
        <h3 class="text-lg font-semibold mb-2">Code Snippets</h3>
        <div class="tabs">
            <a class="tab tab-lifted dark:text-gray-100">Python</a>
            <a class="tab tab-lifted tab-active dark:text-gray-100">JavaScript</a>
            <a class="tab tab-lifted dark:text-gray-100">cURL</a>
        </div>
        <pre class="bg-white dark:bg-gray-900 p-4 rounded text-base-content dark:text-gray-100 overflow-x-auto">
<code class="language-javascript">fetch('https://api.example.com/users/1', {
  method: 'GET',
  headers: {
    'Authorization': 'Bearer YOUR_API_KEY'
  }
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));</code></pre>
    </footer>
</div>
