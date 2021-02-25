<?php

namespace ContainerQf9mpCY;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder0066e = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerb0f87 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties7d086 = [
        
    ];

    public function getConnection()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getConnection', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getMetadataFactory', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getExpressionBuilder', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'beginTransaction', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getCache', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getCache();
    }

    public function transactional($func)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'transactional', array('func' => $func), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->transactional($func);
    }

    public function commit()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'commit', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->commit();
    }

    public function rollback()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'rollback', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getClassMetadata', array('className' => $className), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'createQuery', array('dql' => $dql), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'createNamedQuery', array('name' => $name), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'createQueryBuilder', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'flush', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'clear', array('entityName' => $entityName), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->clear($entityName);
    }

    public function close()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'close', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->close();
    }

    public function persist($entity)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'persist', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'remove', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'refresh', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'detach', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'merge', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getRepository', array('entityName' => $entityName), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'contains', array('entity' => $entity), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getEventManager', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getConfiguration', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'isOpen', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getUnitOfWork', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getProxyFactory', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'initializeObject', array('obj' => $obj), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'getFilters', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'isFiltersStateClean', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'hasFilters', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return $this->valueHolder0066e->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerb0f87 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder0066e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder0066e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder0066e->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, '__get', ['name' => $name], $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        if (isset(self::$publicProperties7d086[$name])) {
            return $this->valueHolder0066e->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0066e;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder0066e;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0066e;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder0066e;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, '__isset', array('name' => $name), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0066e;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder0066e;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, '__unset', array('name' => $name), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0066e;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder0066e;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, '__clone', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        $this->valueHolder0066e = clone $this->valueHolder0066e;
    }

    public function __sleep()
    {
        $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, '__sleep', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;

        return array('valueHolder0066e');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerb0f87 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerb0f87;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerb0f87 && ($this->initializerb0f87->__invoke($valueHolder0066e, $this, 'initializeProxy', array(), $this->initializerb0f87) || 1) && $this->valueHolder0066e = $valueHolder0066e;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder0066e;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder0066e;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
