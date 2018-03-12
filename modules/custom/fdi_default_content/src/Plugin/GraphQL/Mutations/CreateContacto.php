<?php

/**
 * @file
 * Defines a mutation to create a node contacto.
 */

namespace Drupal\fdi_default_content\Plugin\GraphQL\Mutations;

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
  protected function extractEntityInput(array $args, ResolveInfo $info) {
    return [
      'title' => $args['input']['title'],
      'field_correo' => $args['input']['field_correo'],
      'field_telefono' => $args['input']['field_telefono'],
      'body' => $args['input']['body'],
      'field_codigo_de_seguimient' => $args['input']['field_codigo_de_seguimient'],
    ];
  }

}
