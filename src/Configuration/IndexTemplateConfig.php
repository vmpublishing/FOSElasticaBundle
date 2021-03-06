<?php

namespace FOS\ElasticaBundle\Configuration;

/**
 * Index template configuration class
 *
 * @author Dmitry Balabka <dmitry.balabka@intexsys.lv>
 */
class IndexTemplateConfig implements IndexConfigInterface
{
    use IndexConfigTrait;

    /**
     * Index name pattern
     *
     * @var string
     */
    private $template;

    /**
     * Constructor expects an array as generated by the Container Configuration builder.
     *
     * @param string       $name
     * @param TypeConfig[] $types
     * @param array        $config
     */
    public function __construct($name, array $types, array $config)
    {
        $this->elasticSearchName = $config['elasticSearchName'] ?? $name;
        $this->name = $name;
        $this->settings = $config['settings'] ?? array();

        if (!isset($config['template'])) {
            throw new \InvalidArgumentException('Index template value must be set');
        }

        $this->template = $config['template'];
        $this->types = $types;
    }

    /**
     * Gets index name pattern
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
