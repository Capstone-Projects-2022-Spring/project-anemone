class Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Anemone OpenApi Demo Documentation",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="project.anemone.email@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Anemone API Server"
     * )
     *
     * @OA\Tag(
     *     name="Anemone",
     *     description="API Endpoints of Anemone"
     * )
     * @OA\Get(
     *     path="/",
     *     description="Home page",
     *     @OA\Response(response="default", description="About page")
     * )
     */
}
