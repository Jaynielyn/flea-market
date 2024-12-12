<?php
namespace Aws\NetworkManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Network Manager** service.
 * @method \Aws\Result acceptAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAttachmentAsync(array $args = [])
 * @method \Aws\Result associateConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateConnectPeerAsync(array $args = [])
 * @method \Aws\Result associateCustomerGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCustomerGatewayAsync(array $args = [])
 * @method \Aws\Result associateLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLinkAsync(array $args = [])
 * @method \Aws\Result associateTransitGatewayConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTransitGatewayConnectPeerAsync(array $args = [])
 * @method \Aws\Result createConnectAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectAttachmentAsync(array $args = [])
 * @method \Aws\Result createConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectPeerAsync(array $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \Aws\Result createCoreNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createCoreNetworkAsync(array $args = [])
 * @method \Aws\Result createDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceAsync(array $args = [])
 * @method \Aws\Result createDirectConnectGatewayAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAttachmentAsync(array $args = [])
 * @method \Aws\Result createGlobalNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalNetworkAsync(array $args = [])
 * @method \Aws\Result createLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @method \Aws\Result createSite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSiteAsync(array $args = [])
 * @method \Aws\Result createSiteToSiteVpnAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSiteToSiteVpnAttachmentAsync(array $args = [])
 * @method \Aws\Result createTransitGatewayPeering(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTransitGatewayPeeringAsync(array $args = [])
 * @method \Aws\Result createTransitGatewayRouteTableAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTransitGatewayRouteTableAttachmentAsync(array $args = [])
 * @method \Aws\Result createVpcAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcAttachmentAsync(array $args = [])
 * @method \Aws\Result deleteAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array $args = [])
 * @method \Aws\Result deleteConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectPeerAsync(array $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \Aws\Result deleteCoreNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreNetworkAsync(array $args = [])
 * @method \Aws\Result deleteCoreNetworkPolicyVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreNetworkPolicyVersionAsync(array $args = [])
 * @method \Aws\Result deleteDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeviceAsync(array $args = [])
 * @method \Aws\Result deleteGlobalNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalNetworkAsync(array $args = [])
 * @method \Aws\Result deleteLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @method \Aws\Result deletePeering(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePeeringAsync(array $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \Aws\Result deleteSite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSiteAsync(array $args = [])
 * @method \Aws\Result deregisterTransitGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTransitGatewayAsync(array $args = [])
 * @method \Aws\Result describeGlobalNetworks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalNetworksAsync(array $args = [])
 * @method \Aws\Result disassociateConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateConnectPeerAsync(array $args = [])
 * @method \Aws\Result disassociateCustomerGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCustomerGatewayAsync(array $args = [])
 * @method \Aws\Result disassociateLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLinkAsync(array $args = [])
 * @method \Aws\Result disassociateTransitGatewayConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTransitGatewayConnectPeerAsync(array $args = [])
 * @method \Aws\Result executeCoreNetworkChangeSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise executeCoreNetworkChangeSetAsync(array $args = [])
 * @method \Aws\Result getConnectAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectAttachmentAsync(array $args = [])
 * @method \Aws\Result getConnectPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectPeerAsync(array $args = [])
 * @method \Aws\Result getConnectPeerAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectPeerAssociationsAsync(array $args = [])
 * @method \Aws\Result getConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionsAsync(array $args = [])
 * @method \Aws\Result getCoreNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkAsync(array $args = [])
 * @method \Aws\Result getCoreNetworkChangeEvents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkChangeEventsAsync(array $args = [])
 * @method \Aws\Result getCoreNetworkChangeSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkChangeSetAsync(array $args = [])
 * @method \Aws\Result getCoreNetworkPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkPolicyAsync(array $args = [])
 * @method \Aws\Result getCustomerGatewayAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomerGatewayAssociationsAsync(array $args = [])
 * @method \Aws\Result getDevices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicesAsync(array $args = [])
 * @method \Aws\Result getDirectConnectGatewayAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectConnectGatewayAttachmentAsync(array $args = [])
 * @method \Aws\Result getLinkAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkAssociationsAsync(array $args = [])
 * @method \Aws\Result getLinks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinksAsync(array $args = [])
 * @method \Aws\Result getNetworkResourceCounts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkResourceCountsAsync(array $args = [])
 * @method \Aws\Result getNetworkResourceRelationships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkResourceRelationshipsAsync(array $args = [])
 * @method \Aws\Result getNetworkResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkResourcesAsync(array $args = [])
 * @method \Aws\Result getNetworkRoutes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkRoutesAsync(array $args = [])
 * @method \Aws\Result getNetworkTelemetry(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkTelemetryAsync(array $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \Aws\Result getRouteAnalysis(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouteAnalysisAsync(array $args = [])
 * @method \Aws\Result getSiteToSiteVpnAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSiteToSiteVpnAttachmentAsync(array $args = [])
 * @method \Aws\Result getSites(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSitesAsync(array $args = [])
 * @method \Aws\Result getTransitGatewayConnectPeerAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayConnectPeerAssociationsAsync(array $args = [])
 * @method \Aws\Result getTransitGatewayPeering(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayPeeringAsync(array $args = [])
 * @method \Aws\Result getTransitGatewayRegistrations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayRegistrationsAsync(array $args = [])
 * @method \Aws\Result getTransitGatewayRouteTableAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayRouteTableAttachmentAsync(array $args = [])
 * @method \Aws\Result getVpcAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcAttachmentAsync(array $args = [])
 * @method \Aws\Result listAttachments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachmentsAsync(array $args = [])
 * @method \Aws\Result listConnectPeers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectPeersAsync(array $args = [])
 * @method \Aws\Result listCoreNetworkPolicyVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreNetworkPolicyVersionsAsync(array $args = [])
 * @method \Aws\Result listCoreNetworks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreNetworksAsync(array $args = [])
 * @method \Aws\Result listOrganizationServiceAccessStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationServiceAccessStatusAsync(array $args = [])
 * @method \Aws\Result listPeerings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPeeringsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putCoreNetworkPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putCoreNetworkPolicyAsync(array $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \Aws\Result registerTransitGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTransitGatewayAsync(array $args = [])
 * @method \Aws\Result rejectAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectAttachmentAsync(array $args = [])
 * @method \Aws\Result restoreCoreNetworkPolicyVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreCoreNetworkPolicyVersionAsync(array $args = [])
 * @method \Aws\Result startOrganizationServiceAccessUpdate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startOrganizationServiceAccessUpdateAsync(array $args = [])
 * @method \Aws\Result startRouteAnalysis(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startRouteAnalysisAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @method \Aws\Result updateCoreNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCoreNetworkAsync(array $args = [])
 * @method \Aws\Result updateDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceAsync(array $args = [])
 * @method \Aws\Result updateDirectConnectGatewayAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAttachmentAsync(array $args = [])
 * @method \Aws\Result updateGlobalNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalNetworkAsync(array $args = [])
 * @method \Aws\Result updateLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 * @method \Aws\Result updateNetworkResourceMetadata(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkResourceMetadataAsync(array $args = [])
 * @method \Aws\Result updateSite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSiteAsync(array $args = [])
 * @method \Aws\Result updateVpcAttachment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcAttachmentAsync(array $args = [])
 */
class NetworkManagerClient extends AwsClient {}