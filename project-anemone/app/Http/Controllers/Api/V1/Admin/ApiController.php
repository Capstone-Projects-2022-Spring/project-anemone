use Yaml;

class ApiController extends Controller{
	$yamlContents = Yaml::parse(file_get_contents('filepath'));
}