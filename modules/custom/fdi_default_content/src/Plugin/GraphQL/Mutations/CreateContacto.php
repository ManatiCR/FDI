<?php

/**
 * @file
 * Defines a mutation to create a node contacto.
 */

namespace Drupal\fdi_default_content\Plugin\GraphQL\Mutations;

use Drupal\graphql\GraphQL\Type\InputObjectType;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;
use Youshido\GraphQL\Execution\ResolveInfo;
/**
 * Simple mutation for creating a new contacto node.
 *
 * @GraphQLMutation(
 *   id = "create_contacto",
 *   entity_type = "node",
 *   entity_bundle = "contacto",
 *   secure = true,
 *   name = "createContacto",
 *   type = "EntityCrudOutput!",
 *   arguments = {
 *     "input" = "ContactoInput"
 *   }
 * )
 */
class CreateContacto extends CreateEntityBase {
  /**
   * {@inheritdoc}
   */
  protected function extractEntityInput(array $input_args, InputObjectType $input_type, ResolveInfo $info) {
    return [
      'title' => $input_args['title'],
      'field_correo' => $input_args['field_correo'],
      'field_telefono' => $input_args['field_telefono'],
      'body' => $input_args['body'],
      'field_codigo_de_seguimient' => $input_args['field_codigo_de_seguimient'],
    ];
  }

}
