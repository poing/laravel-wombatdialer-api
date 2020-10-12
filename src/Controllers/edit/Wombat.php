<?php
namespace WombatDialer\Controllers\edit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use Mail;

abstract class Wombat extends Controller
{
   /**
     * The connection resource for WombatDialer.
     *
     * @var array
    */
    protected $resource = [];

    /**
     * The URL for WombatDialer .
     *
     * @var string
     */
    protected $url;

    /**
     * The Username for WombatDialer .
     *
     * @var string
     */
    protected $user;

    /**
     * The Password for WombatDialer .
     *
     * @var string
     */
    protected $pass;

    /**
     * The trailingslash for the query in  WombatDialer .
     *
     * @var string|true(default)
     */
    protected $trailingslash = true;

    /**
     * Fetch the URL, Username and Password from the Config File.
     *
     * @return void
     */
    public function __construct()
    {
        $this->resource = config('wombatdialer.url');
        $this->user = config('wombatdialer.admin.user');
        $this->pass = config('wombatdialer.admin.pass');
    }

     /**
     * User authentication.
     *
     * @return void
     */
    public function userAuth()
    {
        return $this->user;
    }

    /**
     * Password authentication.
     *
     * @return void
     */
    public function passAuth()
    {
        return $this->pass;
    }

    /**
     * Update the URL for WombatDialer with Path and Query parameters.
     *
     * @return $this
     */
    public function connection()
    {

        $this->appendPath()
            ->addQuery()
            ->unparse_url();
        return $this->url;
    }

    /**
     * Appends the Path to the  URL.
     *
     * @return $this
     */
    public function appendPath()
    {
        $this->addPath();
        return $this;
    }

    /**
     * Appends the Query to the URL.
     *
     * @param array $query is not empty , add the query using http_build_query().
     *
     * @return $this
     */
    public function addQuery()
    {
        //$this->query = ['mode' => 'L',];
        if (!empty($this->query))
        {
            $this->resource['query'] = http_build_query($this->query);
        }
        return $this;

    }

    /**
     * Unparse the URL to a 'String'.
     *
     * @return $this
     */
    private function unparse_url()
    {
        $scheme = isset($this->resource['scheme']) ? $this->resource['scheme'] . '://' : '';
        $host = isset($this->resource['host']) ? $this->resource['host'] : '';
        $port = isset($this->resource['port']) ? ':' . $this->resource['port'] : '';
        $user = isset($this->resource['user']) ? $this->resource['user'] : '';
        $pass = isset($this->resource['pass']) ? ':' . $this->resource['pass'] : '';
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = isset($this->resource['path']) ? $this->resource['path'] : '';
        $query = isset($this->resource['query']) ? '?' . $this->resource['query'] : '';
        $fragment = isset($this->resource['fragment']) ? '#' . $this->resource['fragment'] : '';

        $this->url = "$scheme$user$pass$host$port$path$query$fragment";
        return $this;
    }

    /**
     * @param  string $slash checks the $trailing slash (True/false) and returns the path of the URL.
     *
     * @return $this
     */
    public function addPath()
    {
        $org_uri = explode('/', $this->resource['path']);
        $add_uri = explode('/', $this->path);
        $new_uri = array_merge($org_uri, $add_uri);

        $slash = $this->trailingslash ? '/' : null;
        $this->resource['path'] = '/' . implode('/', array_filter($new_uri)) . $slash;

        return $this;

    }

    /**
     * Perform API GET.
     * Returns the record based on the params $items and  $from  from the API record.
     *
     * @params  $items and $from
     * @return json response
     */
    public function index($items = null, $from = null)
    {
        $items = $items ? $items : null;
        $from = $from ? $from : null;
        $this->query = ['items' => $items, 'from' => $from];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();

    }

    /**
     * Perform API GET.
     * Finds record based on the primary key for the API record.
     *
     * @param  string  $id
     * @return array
     */
    public function show($id)
    {

        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        $record = collect($response->json() ['results'])
            ->where($this->primaryKeyname, $id)->first();
        return $record;
    }

    /**
     * Perform API POST.
     * Creates a new record for the API.
     *
     * @param  array  $data
     * @return array
     */
    public function create($data)
    {
        $this->query = ['mode' => 'E']; // E for Edit
        $newData = array_merge($this->default, $data);
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($newData) ]);

        // $record = collect($results['results'])->first()[$this->primaryKeyname];
        return $response->json();

    }

    /**
     * Perform API POST.
     * Updates the record based on the primary key for the API record.
     *
     * @param  array  $data
     * @return array
     */

    public function update($data)
    {
        //$this->create($data);
        $this->query = ['mode' => 'E']; // E for Edit
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);

        return $response->json();
    }

    /**
     * Perform API POST.
     * Deletes  the record based on the primary key for the API record.
     *
     * @param  string  $id
     * @return array
     */
    public function destroy($id)
    {
        $this->query = ['mode' => 'D'];
        $myData = [$this->primaryKeyname => $id];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($myData) ]);
        return $response->json();
    }

    /**
     * Generates a  Formatted HTML_MAIL.
     * @param $response fails, It generates a html_mail.
     *
     * @return string
     */
    public function html_email()
    {

        if ($response->failed() || $response->serverError() || $response->clientError())
        {
            Mail::send([], [], function ($message) use ($response)
            {
                $message->to('dev@invite-comm.jp')
                    ->subject('Sample test with API' . time())
                    ->setBody($response, 'text/html');
            });
        }
        return "Mail Sent Successfully";
    }


}

