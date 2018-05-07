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
      'field_sitio_web' => $args['input']['field_sitio_web'],
      'field_nombre_del_sitio' => $args['input']['field_nombre_del_sitio'],
      'field_otro_motivo' => $args['input']['field_otro_motivo'],
      'field_motivo_de_contacto' => $args['input']['field_motivo_de_contacto'],
      'field_codigo_de_seguimient' => $args['input']['field_codigo_de_seguimient'],
    ];
  }

}
