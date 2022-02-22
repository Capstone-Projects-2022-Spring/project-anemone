use Yaml;

class ProjectsApiController extends Controller{
	$yamlContents = Yaml::parse(file_get_contents('filepath'));
}
